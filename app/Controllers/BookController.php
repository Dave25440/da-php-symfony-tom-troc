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

        $bookManager = new BookManager();
        $book = $bookManager->findById($id);

        if ($book === null) {
            throw new \Exception('Le livre demandé est introuvable.');
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

    public function add(): void
    {
        $view = new View('Ajouter un livre');
        $view->render('addBook', 'account');
    }

    public function edit(): void
    {
        $this->checkAuth();

        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $book = $this->load($id);

        if ($book->getUserId() !== $this->user->getId()) {
            header('Location: index.php?action=editAccount');
            exit;
        }

        $view = new View('Modifier ' . $book->getTitle(), ['book' => $book]);
        $view->render('editBook', 'account');
    }

    public function delete(): void
    {
        $this->checkAuth();

        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $bookManager = new BookManager();
        $book = $bookManager->findById($id);

        if (!$book || $book->getUserId() !== $this->user->getId()) {
            header('Location: index.php?action=editAccount');
            exit;
        }

        $bookManager->delete($id);

        header('Location: index.php?action=editAccount');
        exit;
    }
}
