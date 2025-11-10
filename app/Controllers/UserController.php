<?php 

namespace App\Controllers;

use App\Models\User;
use App\Models\Managers\BookManager;
use App\Models\Managers\UserManager;
use App\Views\View;

class UserController extends AbstractController
{
    protected function load(int $id): array
    {
        if ($id <= 0) {
            throw new \Exception("Le profil demandé est introuvable.");
        }

        $userManager = new UserManager();
        $user = $userManager->findById($id);

        if ($user === null) {
            throw new \Exception("Le profil demandé est introuvable.");
        }

        $bookManager = new BookManager();
        $books = $bookManager->findByUserId($user->getId());

        $memberSince = $user->getMemberSince();
        $booksCount = count($books);

        // Crée un tableau associatif à partir de variables
        return compact('user', 'books', 'memberSince', 'booksCount');
    }

    protected function validate(string $nickname, string $email, string $password, ?int $id = null): ?string
    {
        $userManager = new UserManager();
        $usedNickname = $userManager->findByNickname($nickname);
        $usedEmail = $userManager->findByEmail($email);

        if (strlen($nickname) > 50) {
            return 'Le pseudo ne doit pas dépasser 50 caractères.';
        } elseif (strlen($email) > 100) {
            return "L'adresse email ne doit pas dépasser 100 caractères.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Adresse '$email' invalide.";
        } elseif ($password !== '' && strlen($password) < 8) {
            return 'Le mot de passe doit compter au moins 8 caractères.';
        } elseif ($usedNickname && ($id === null || $usedNickname->getId() !== $id)) {
            return "Pseudo '$nickname' indisponible.";
        } elseif ($usedEmail && ($id === null || $usedEmail->getId() !== $id)) {
            return "Adresse '$email' indisponible.";
        }

        return null;
    }

    public function show(): void
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $data = $this->load($id);

        $view = new View('Profil de ' . $data['user']->getNickname(), $data);
        $view->render('account');
    }

    public function edit(array $update = []): void
    {
        $this->checkAuth();

        $data = $this->load($this->user->getId());

        $params = [
            'success' => 'Mise à jour réussie.',
            'errorUpload' => "Erreur lors de l'envoi du fichier.",
            'successAvatar' => 'Mise à jour réussie.'
        ];

        foreach (array_keys($params) as $p) {
            if (isset($_GET[$p])) {
                $update[$p] = $params[$p];
            }
        }

        $data = array_merge($data, $update);

        $view = new View('Mon compte', $data);
        $view->render('editAccount', 'account');
    }

    public function update(): void
    {
        $this->checkAuth();

        $user = $this->user;
        $id = $this->user->getId();

        $nicknameRaw = trim($_POST['nickname'] ?? '');
        $nickname = str_replace(' ', '_', $nicknameRaw);
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $data = ['error' => null, 'nickname' => $nickname, 'email' => $email];

        if (
            $nickname === $user->getNickname() &&
            $email === $user->getEmail() &&
            $password === ''
        ) {
            $data['error'] = 'Données identiques.';
        } elseif (empty($nickname) || empty($email)) {
            $data['error'] = "Les champs 'Pseudo' et 'Adresse email' sont obligatoires.";
        } else {
            $error = $this->validate($nickname, $email, $password, $id);

            if ($error) {
                $data['error'] = $error;
            }
        }

        if ($data['error']) {
            $this->edit($data);
            return;
        }

        $user->setNickname($nickname);
        $user->setEmail($email);

        if ($password !== '') {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $user->setPassword($hash);
        }

        $userManager = new UserManager();
        $userManager->update($user);

        header('Location: index.php?action=editAccount&success');
        exit;
    }

    public function updateAvatar(): void
    {
        $this->checkAuth();

        $id = $this->user->getId();
        $data = ['errorAvatar' => null];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $file = $_FILES['avatar'] ?? null;

            if (!$file) {
                $data['errorAvatar'] = 'Aucun fichier envoyé.';
            } elseif ($error = $this->validateImage($file, ['image/gif'])) {
                $data['errorAvatar'] = $error;
            } else {
                $image = $this->processImage($file['tmp_name'], 135, 135);

                if ($image === false) {
                    $data['errorAvatar'] = "Erreur lors du traitement de l'image.";
                } else {
                    $dir = __DIR__ . '/../../public/images/users/';

                    if (!is_dir($dir) && !mkdir($dir, 0755, true)) {
                        imagedestroy($image);
                        $data['errorAvatar'] = 'Dossier de destination indisponible.';
                    } else {
                        $avatar = 'avatar' . $id . '.webp';
                        $path = $dir . $avatar;
                        $saved = imagewebp($image, $path, 80);
                        imagedestroy($image);

                        if (!$saved) {
                            $data['errorAvatar'] = "Erreur lors de la sauvegarde de l'image.";
                        }
                    }
                }
            }

            if ($data['errorAvatar']) {
                $this->edit($data);
                return;
            }

            $userAvatar = $this->user->getAvatar();

            if ($avatar !== $userAvatar) {
                $userManager = new UserManager();
                $userManager->updateAvatar($id, $avatar);

                // Met à jour l’objet en mémoire
                $this->user->setAvatar($avatar);
            }

            header('Location: index.php?action=editAccount&successAvatar');
            exit;
        }

        header('Location: index.php?action=editAccount&uploadError');
        exit;
    }

    public function signUp(array $data = []): void
    {
        $view = new View('Inscription', $data);
        $view->render('signup', 'signin');
    }

    public function register(): void
    {
        $nicknameRaw = trim($_POST['nickname'] ?? '');
        $nickname = str_replace(' ', '_', $nicknameRaw);
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $data = ['error' => null, 'nickname' => $nickname, 'email' => $email];

        if (empty($nickname) || empty($email) || empty($password)) {
            $data['error'] = 'Tous les champs sont obligatoires.';
        } else {
            $error = $this->validate($nickname, $email, $password);

            if ($error) {
                $data['error'] = $error;
            }
        }

        if ($data['error']) {
            $this->signUp($data);
            return;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $user = new User($nickname, $email, $hash);

        $userManager = new UserManager();
        $userManager->add($user);

        header('Location: index.php?action=signin&register');
        exit;
    }

    public function signIn(array $data = []): void
    {
        if (isset($_GET['register'])) {
            $data['register'] = 'Inscription réussie, vous pouvez vous connecter.';
        }

        $view = new View('Connexion', $data);
        $view->render('signin', 'signin');
    }

    public function logIn(): void
    {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? null;
        $data = ['error' => null, 'email' => $email];

        if (empty($email) || empty($password)) {
            $data['error'] = 'Tous les champs sont obligatoires.';
        } else {
            $userManager = new UserManager();
            $user = $userManager->findByEmail($email);

            if (!$user || !password_verify($password, $user->getPassword())) {
                $data['error'] = 'Données incorrectes.';
            }
        }

        if ($data['error']) {
            $this->signIn($data);
            return;
        }

        $_SESSION['user_id'] = $user->getId();

        header('Location: index.php?action=editAccount');
        exit;
    }

    public function logOut(): void
    {
        unset($_SESSION['user_id']);

        header('Location: index.php');
        exit;
    }
}
