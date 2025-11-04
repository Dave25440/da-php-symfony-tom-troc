<?php 

namespace App\Controllers;

use App\Models\Book;
use App\Models\Managers\BookManager;
use App\Models\Managers\UserManager;
use App\Views\View;

class BookController
{
    protected function load(int $id) : Book
    {
        if ($id <= 0) {
            throw new \Exception('Le livre demandé est introuvable.');
        }

        $bookManager = new BookManager();
        $book = $bookManager->findById($id);

        if ($book === null) {
            throw new \Exception('Le livre demandé est introuvable.');
        }

        return $book;
    }

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

    public function search(): void
    {
        $search = $_GET['search'] ?? '';

        $bookManager = new BookManager();
        $books = $bookManager->findBySearchForJson($search);

        header('Content-Type: application/json');
        echo json_encode($books);
        exit;
    }

    public function show() : void
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $book = $this->load($id);

        $userManager = new UserManager();
        $user = $userManager->findById($book->getUserId());

        $view = new View($book->getTitle(), ['book' => $book, 'user' => $user]);
        $view->render('book', 'books');
    }

    public function edit() : void
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $book = $this->load($id);

        $view = new View('Modifier ' . $book->getTitle(), ['book' => $book]);
        $view->render('editBook', 'account');
    }
}
