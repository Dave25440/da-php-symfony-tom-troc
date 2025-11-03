<?php 

namespace App\Controllers;

use App\Models\Managers\BookManager;
use App\Models\Managers\UserManager;
use App\Views\View;

class UserController
{
    public function show() : void
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

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

        $view = new View('Profil de ' . $user->getNickname(), ['user' => $user, 'books' => $books]);
        $view->render('account');
    }

    public function signIn() : void
    {
        $view = new View('Connexion');
        $view->render('signin', 'signin');
    }

    public function signUp() : void
    {
        $view = new View('Inscription');
        $view->render('signup', 'signin');
    }

    public function edit() : void
    {
        $view = new View('Mon compte');
        $view->render('editAccount', 'account');
    }
}
