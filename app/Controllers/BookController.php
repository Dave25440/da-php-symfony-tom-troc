<?php 

namespace App\Controllers;

use App\Models\Managers\BookManager;
use App\Models\Managers\UserManager;
use App\Views\View;

class BookController
{
    public function list() : void
    {
        $search = $_GET['search'] ?? '';
        $bookManager = new BookManager();

        if ($search !== '') {
            $books = $bookManager->findBySearch($search);
        } else {
            $books = $bookManager->findAll();
        }

        $view = new View('Nos livres', ['books' => $books, 'search' => $search]);
        $view->render('books', 'books');
    }

    public function show() : void
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

        $userManager = new UserManager();
        $user = $userManager->findById($book->getUserId());

        $view = new View($book->getTitle(), ['book' => $book, 'user' => $user]);
        $view->render('book', 'books');
    }

    public function search(): void
    {
        $search = $_GET['search'] ?? '';

        $bookManager = new BookManager();
        $books = $bookManager->findBySearchForJson($search);

        header('Content-Type: application/json');
        echo json_encode($books);
        exit;
    }

    public function edit() : void
    {
        $view = new View('The Kinfolk Table');
        $view->render('editBook', 'account');
    }
}
