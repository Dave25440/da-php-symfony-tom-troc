<?php 

namespace App\Controllers;

use App\Views\View;

class UserController
{
    public function editAccount() : void
    {
        $view = new View('Mon compte');
        $view->render('account', 'account');
    }

    public function showSignIn() : void
    {
        $view = new View('Connexion');
        $view->render('signin', 'signin');
    }
}
