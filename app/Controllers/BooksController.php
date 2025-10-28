<?php 

namespace App\Controllers;

use App\Views\View;

class BooksController
{
    public function showBooks() : void
    {
        $view = new View('Nos livres');
        $view->render('books', 'books');
    }
}
