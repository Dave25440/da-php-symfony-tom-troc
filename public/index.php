<?php

$configPath = __DIR__ . '/../app/Config/config.php';

if (file_exists($configPath)) {
    require_once $configPath;
} else {
    throw new Exception('Le fichier de configuration est introuvable.');
}

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\BookController;
use App\Controllers\ChatController;
use App\Controllers\UserController;

$action = $_GET['action'] ?? 'home';

try {
    switch ($action) {
        case 'home':
            (new HomeController())->showHome();
            break;

        case 'books':
            (new BookController())->showBooks();
            break;

        case 'book':
            (new BookController())->showBook();
            break;

        case 'chat':
            (new ChatController())->showChat();
            break;

        case 'account':
            (new UserController())->showAccount();
            break;

        case 'signin':
            (new UserController())->showSignIn();
            break;

        case 'signup':
            (new UserController())->showSignUp();
            break;

        case 'editAccount':
            (new UserController())->editAccount();
            break;

        case 'editBook':
            (new BookController())->editBook();
            break;

        default:
            throw new Exception("Action '$action' inconnue ou indisponible.");
    }
} catch (Exception $e) {
    error_log('Erreur de navigation : ' . $e->getMessage());
    http_response_code(404);
    die('La page demandée est introuvable.');
}