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

    public function showBook() : void
    {
        $view = new View('The Kinfolk Table');
        $view->render('book', 'books');
    }
}
