<?php 

namespace App\Controllers;

use App\Models\Book;
use App\Models\Managers\BookManager;
use App\Models\Managers\UserManager;
use App\Views\View;

class BookController extends AbstractController
{
    protected function load(int $id): Book
    {
        if ($id <= 0) {
            throw new \Exception('Le livre demandé est introuvable.');
        }

        $userId = $this->user ? $this->user->getId() : null;

        $bookManager = new BookManager();
        $book = $bookManager->findById($id, $userId);

        if ($book === null) {
            throw new \Exception('Le livre demandé est introuvable.');
        }

        return $book;
    }

    protected function checkOwner(int $id): Book
    {
        $book = $this->load($id);

        if ($book->getUserId() !== $this->user->getId()) {
            header('Location: index.php?action=editAccount');
            exit;
        }

        return $book;
    }

    protected function validate(string $title, string $author, ?string $description = null): ?string
    {
        if (empty($title) || empty($author)) {
            return "Les champs 'Titre' et 'Auteur' sont obligatoires.";
        } elseif (strlen($title) > 100) {
            return 'Le titre ne doit pas dépasser 100 caractères.';
        } elseif (strlen($author) > 50) {
            return "L'auteur ne doit pas dépasser 50 caractères.";
        } elseif ($description !== null && strlen($description) > 1000) {
            return "La description ne doit pas dépasser 1000 caractères.";
        }

        return null;
    }

    protected function nameCover(string $title, string $author, int $userId): string
    {
        $slugify = function (string $text): string {
            $text = mb_strtolower($text, 'UTF-8');

            // Supprime les accents avec translittération
            $text = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);

            // Remplace les caractères non alphanumériques par des tirets
            $text = preg_replace('~[^\w]+~', '-', $text);

            // Supprime les tirets en début et fin de chaîne
            $text = trim($text, '-');

            // Renvoie 'cover' si le résultat est vide
            return $text ?: 'cover';
        };

        $slugTitle = $slugify($title);

        // Découpe le nom de l'auteur selon les espaces
        $authorNames = preg_split('/\s+/', trim($author));

        // Récupère le nom de famille
        $lastName = mb_strtolower(end($authorNames), 'UTF-8');

        $slugAuthor = $slugify($lastName);

        return sprintf('%s-%s-%d.webp', $slugTitle, $slugAuthor, $userId);
    }

    protected function processCover(array $file, string $title, string $author, int $userId): array
    {
        $image = $this->processImage($file['tmp_name'], 720, 863);

        if ($image === false) {
            return ['error' => "Erreur lors du traitement de l'image."];
        }

        $dir = __DIR__ . '/../../public/images/books/';

        if (!is_dir($dir) && !mkdir($dir, 0755, true)) {
            imagedestroy($image);
            return ['error' => 'Dossier de destination indisponible.'];
        }

        $coverImage = $this->nameCover($title, $author, $userId);

        $path = $dir . $coverImage;
        $saved = imagewebp($image, $path, 75);
        imagedestroy($image);

        if (!$saved) {
            return ['error' => "Erreur lors de la sauvegarde de l'image."];
        }

        return ['coverImage' => $coverImage];
    }

    public function list(): void
    {
        $search = $_GET['search'] ?? '';
        $bookManager = new BookManager();

        if ($search !== '') {
            $books = $bookManager->findBySearch($search);
        } else {
            $books = $bookManager->findAll();
        }

        $view = new View('Nos livres', ['books' => $books, 'search' => $search]);
        $view->render('books', 'books');
    }

    public function search(): void
    {
        $search = $_GET['search'] ?? '';

        $bookManager = new BookManager();
        $books = $bookManager->findBySearchForJson($search);

        header('Content-Type: application/json');
        echo json_encode($books);
        exit;
    }

    public function show(): void
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $book = $this->load($id);

        $userManager = new UserManager();
        $user = $userManager->findById($book->getUserId());

        $view = new View($book->getTitle(), ['book' => $book, 'user' => $user]);
        $view->render('book', 'books');
    }

    public function add(array $data = []): void
    {
        $this->checkAuth();

        $view = new View('Ajouter un livre', $data);
        $view->render('addBook', 'account');
    }

    public function store(): void
    {
        $this->checkAuth();

        $userId = $this->user->getId();
        $title = trim($_POST['title'] ?? '');
        $author = trim($_POST['author'] ?? '');
        $file = $_FILES['cover_image'] ?? null;
        $coverImage = null;

        $description = isset($_POST['description']) && trim($_POST['description']) !== ''
            ? trim($_POST['description'])
            : null;

        $isExchangeable = isset($_POST['is_exchangeable']) ? (bool) $_POST['is_exchangeable'] : 0;

        $data = [
            'error' => null,
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'isExchangeable' => $isExchangeable
        ];

        $error = $this->validate($title, $author, $description);

        if ($error) {
            $data['error'] = $error;
        } elseif ($file && $file['error'] !== UPLOAD_ERR_NO_FILE) {
            $errorCover = $this->validateImage($file);

            if ($errorCover) {
                $data['error'] = $errorCover;
            } else {
                $cover = $this->processCover($file, $title, $author, $userId);

                if (isset($cover['error'])) {
                    $data['error'] = $cover['error'];
                } else {
                    $coverImage = $cover['coverImage'];
                }
            }
        }

        if ($data['error']) {
            $this->add($data);
            return;
        }

        $book = new Book($userId, $title, $author);
        $book->setCoverImage($coverImage);
        $book->setDescription($description);
        $book->setIsExchangeable($isExchangeable);

        $bookManager = new BookManager();
        $bookManager->add($book);

        header('Location: index.php?action=editAccount');
        exit;
    }

    public function edit(array $data = []): void
    {
        $this->checkAuth();

        // Évite de recharger 'book' et d'utiliser l'id dans l'URL après une erreur
        if (!isset($data['book'])) {
            $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
            $data['book'] = $this->checkOwner($id);
        }

        $view = new View('Modifier ' . $data['book']->getTitle(), $data);
        $view->render('editBook', 'account');
    }

    public function update(): void
    {
        $this->checkAuth();

        $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
        $book = $this->checkOwner($id);

        $userId = $this->user->getId();
        $title = trim($_POST['title'] ?? '');
        $author = trim($_POST['author'] ?? '');
        $file = $_FILES['cover_image'] ?? null;
        $coverImage = $book->getCoverImage();

        $description = isset($_POST['description']) && trim($_POST['description']) !== ''
            ? trim($_POST['description'])
            : null;

        $isExchangeable = isset($_POST['is_exchangeable']) ? (bool) $_POST['is_exchangeable'] : 0;
        $data = ['error' => null, 'book' => $book];

        $error = $this->validate($title, $author, $description);

        if ($error) {
            $data['error'] = $error;
        } elseif ($file && $file['error'] !== UPLOAD_ERR_NO_FILE) {
            $errorCover = $this->validateImage($file);

            if ($errorCover) {
                $data['error'] = $errorCover;
            } else {
                $cover = $this->processCover($file, $title, $author, $userId);

                if (isset($cover['error'])) {
                    $data['error'] = $cover['error'];
                } else {
                    $coverImage = $cover['coverImage'];
                }
            }
        }

        if (
            $title === $book->getTitle() &&
            $author === $book->getAuthor() &&
            $coverImage === $book->getCoverImage() &&
            $description === $book->getDescription() &&
            $isExchangeable === $book->isExchangeable()
        ) {
            header('Location: index.php?action=editAccount');
            exit;
        }

        $book->setTitle($title);
        $book->setAuthor($author);
        $book->setCoverImage($coverImage);
        $book->setDescription($description);
        $book->setIsExchangeable($isExchangeable);

        if ($data['error']) {
            $this->edit($data);
            return;
        }

        $bookManager = new BookManager();
        $bookManager->update($book);

        header('Location: index.php?action=editAccount');
        exit;
    }

    public function delete(): void
    {
        $this->checkAuth();

        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $book = $this->checkOwner($id);

        $bookManager = new BookManager();
        $bookManager->delete($id);

        header('Location: index.php?action=editAccount');
        exit;
    }
}
