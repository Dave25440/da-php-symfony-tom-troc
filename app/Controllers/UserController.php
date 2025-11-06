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

    public function edit(array $update = []) : void
    {
        $this->checkAuth();

        $data = $this->load($_SESSION['userId']);

        if (isset($_GET['success'])) {
            $update['success'] = 'Mise à jour réussie.';
        }

        $data = array_merge($data, $update);

        $view = new View('Mon compte', $data);
        $view->render('editAccount', 'account');
    }

    public function update() : void
    {
        $this->checkAuth();

        $userId = $_SESSION['userId'];
        $nicknameRaw = trim($_POST['nickname'] ?? '');
        $nickname = str_replace(' ', '_', $nicknameRaw);
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $data = ['error' => null, 'nickname' => $nickname, 'email' => $email];

        $userManager = new UserManager();
        $user = $userManager->findById($userId);
        $usedNickname = $userManager->findByNickname($nickname);
        $usedEmail = $userManager->findByEmail($email);

        if (
            $nickname === $user->getNickname() &&
            $email === $user->getEmail() &&
            $password === ''
        ) {
            $data['error'] = 'Données identiques.';
        } elseif (empty($nickname) || empty($email)) {
            $data['error'] = "Les champs 'Pseudo' et 'Adresse email' sont obligatoires.";
        } elseif (strlen($nickname) > 50) {
            $data['error'] = 'Le pseudo ne doit pas dépasser 50 caractères.';
        } elseif (strlen($email) > 100) {
            $data['error'] = "L'adresse email ne doit pas dépasser 100 caractères.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $data['error'] = "Adresse '$email' invalide.";
        } elseif ($password !== '' && strlen($password) < 8) {
            $data['error'] = 'Le mot de passe doit compter au moins 8 caractères.';
        } elseif ($usedNickname && $usedNickname->getId() !== $userId) {
            $data['error'] = "Pseudo '$nickname' indisponible.";
        } elseif ($usedEmail && $usedEmail->getId() !== $userId) {
            $data['error'] = "Adresse '$email' indisponible.";
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

        $userManager->update($user);

        header('Location: index.php?action=editAccount&success');
        exit;
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
        $userManager->add($user);

        header('Location: index.php?action=signin&register');
        exit;
    }

    public function signIn(array $data = []) : void
    {
        if (isset($_GET['register'])) {
            $data['register'] = 'Inscription réussie, vous pouvez vous connecter.';
        }

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
