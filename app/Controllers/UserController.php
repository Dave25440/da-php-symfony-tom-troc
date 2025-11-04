<?php 

namespace App\Controllers;

use App\Models\Managers\BookManager;
use App\Models\Managers\UserManager;
use App\Views\View;

class UserController
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
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $data = $this->load($id);

        $view = new View('Mon compte', $data);
        $view->render('editAccount', 'account');
    }

    public function signUp() : void
    {
        $view = new View('Inscription');
        $view->render('signup', 'signin');
    }

    public function signIn() : void
    {
        $view = new View('Connexion');
        $view->render('signin', 'signin');
    }
}
