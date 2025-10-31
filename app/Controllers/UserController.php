<?php 

namespace App\Controllers;

use App\Views\View;

class UserController
{
    public function show() : void
    {
        $view = new View('Profil de Alexlecture');
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
