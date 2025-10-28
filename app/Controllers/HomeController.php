<?php 

namespace App\Controllers;

use App\Views\View;

class HomeController
{
    public function showHome() : void
    {
        $view = new View('Accueil');
        $view->render('home', 'home');
    }
}
