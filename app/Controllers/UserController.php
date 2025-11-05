<?php 

namespace App\Controllers;

use App\Models\User;
use App\Models\Managers\BookManager;
use App\Models\Managers\UserManager;
use App\Views\View;

class UserController extends AbstractController
{
    protected function load(int $id) : array
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

    public function show() : void
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $data = $this->load($id);

        $view = new View('Profil de ' . $data['user']->getNickname(), $data);
        $view->render('account');
    }

    public function edit() : void
    {
        $this->checkAuth();

        $data = $this->load($_SESSION['userId']);

        $view = new View('Mon compte', $data);
        $view->render('editAccount', 'account');
    }

    public function signUp(array $data = []) : void
    {
        $view = new View('Inscription', $data);
        $view->render('signup', 'signin');
    }

    public function register(): void
    {
        $nickname = str_replace(' ', '_', trim($_POST['nickname'] ?? ''));
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $data = ['error' => null, 'nickname' => $nickname, 'email' => $email];

        if (empty($nickname) || empty($email) || empty($password)) {
            $data['error'] = 'Tous les champs sont obligatoires.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data['error'] = "Adresse '$email' invalide.";
        } elseif (strlen($password) < 8) {
            $data['error'] = 'Le mot de passe doit compter au moins 8 caractères.';
        } else {
            $userManager = new UserManager();

            if ($userManager->findByEmail($email)) {
                $data['error'] = "Adresse '$email' indisponible.";
            }
        }

        if ($data['error']) {
            $this->signUp($data);
            return;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $user = new User($nickname, $email, $hash);
        $userManager->insert($user);

        header('Location: index.php?action=signin');
        exit;
    }

    public function signIn(array $data = []) : void
    {
        $view = new View('Connexion', $data);
        $view->render('signin', 'signin');
    }

    public function logIn() : void
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

        $_SESSION['userId'] = $user->getId();

        header('Location: index.php?action=editAccount');
        exit;
    }

    public function logOut(): void
    {
        unset($_SESSION['userId']);

        header('Location: index.php');
        exit;
    }
}
