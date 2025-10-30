<?php 

namespace App\Controllers;

use App\Models\Managers\BookManager;
use App\Views\View;

class BooksController
{
    public function showBooks() : void
    {
        $bookManager = new BookManager();
        $books = $bookManager->findAll();

        $view = new View('Nos livres', ['books' => $books]);
        $view->render('books', 'books');
    }

    public function showBook() : void
    {
        $view = new View('The Kinfolk Table');
        $view->render('book', 'books');
    }

    public function editBook() : void
    {
        $view = new View('The Kinfolk Table');
        $view->render('editBook', 'account');
    }
}
