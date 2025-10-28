<?php 

namespace App\Controllers;

use App\Views\View;

class UserController
{
    public function showSignIn() : void
    {
        $view = new View('Connexion');
        $view->render('signin', 'signin');
    }

    public function showSignUp() : void
    {
        $view = new View('Inscription');
        $view->render('signup', 'signin');
    }

    public function editAccount() : void
    {
        $view = new View('Mon compte');
        $view->render('editAccount', 'account');
    }
}
