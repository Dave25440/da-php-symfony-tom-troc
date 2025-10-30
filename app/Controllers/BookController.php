<?php 

namespace App\Controllers;

use App\Models\Managers\BookManager;
use App\Views\View;

class BookController
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
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        if ($id <= 0) {
            throw new \Exception('Le livre demandé est introuvable.');
        }

        $bookManager = new BookManager();
        $book = $bookManager->findById($id);

        if ($book === null) {
            throw new \Exception('Le livre demandé est introuvable.');
        }

        $view = new View($book->getTitle(), ['book' => $book]);
        $view->render('book', 'books');
    }

    public function editBook() : void
    {
        $view = new View('The Kinfolk Table');
        $view->render('editBook', 'account');
    }
}
