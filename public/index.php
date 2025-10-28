<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\BooksController;
use App\Controllers\ChatController;
use App\Controllers\UserController;

$action = $_GET['action'] ?? 'home';

try {
    switch ($action) {
        case 'home':
            (new HomeController())->showHome();
            break;

        case 'books':
            (new BooksController())->showBooks();
            break;

        case 'chat':
            (new ChatController())->showChat();
            break;

        case 'account':
            (new UserController())->editAccount();
            break;

        case 'signin':
            (new UserController())->showSignIn();
            break;

        case 'signup':
            (new UserController())->showSignUp();
            break;

        default:
            throw new \Exception("Action '$action' inconnue ou indisponible.");
    }
} catch (Exception $e) {
    error_log('Erreur de navigation : ' . $e->getMessage());
    http_response_code(404);
    die('La page demandée est introuvable.');
}