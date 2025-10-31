<?php 

namespace App\Controllers;

use App\Models\Managers\BookManager;
use App\Views\View;

class HomeController
{
    public function show() : void
    {
        $bookManager = new BookManager();
        $books = $bookManager->findAll(4);

        $view = new View('Accueil', ['books' => $books]);
        $view->render('home', 'home');
    }
}
