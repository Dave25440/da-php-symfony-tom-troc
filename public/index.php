<?php

$config = __DIR__ . '/../app/Config/config.php';

if (file_exists($config)) {
    require_once $config;
} else {
    throw new Exception('Le fichier de configuration est introuvable.');
}

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\BookController;
use App\Controllers\MessageController;
use App\Controllers\UserController;
use App\Views\View;

$action = $_GET['action'] ?? 'home';

try {
    switch ($action) {
        case 'home':
            (new HomeController())->show();
            break;

        case 'privacy':
            (new HomeController())->privacy();
            break;

        case 'legal':
            (new HomeController())->legal();
            break;

        case 'books':
            (new BookController())->list();
            break;

        case 'searchBook':
            (new BookController())->search();
            break;

        case 'book':
            (new BookController())->show();
            break;

        case 'addBook':
            (new BookController())->add();
            break;

        case 'storeBook':
            (new BookController())->store();
            break;

        case 'editBook':
            (new BookController())->edit();
            break;

        case 'updateBook':
            (new BookController())->update();
            break;

        case 'deleteBook':
            (new BookController())->delete();
            break;

        case 'chat':
            (new MessageController())->show();
            break;

        case 'getMessages':
            (new MessageController())->get();
            break;

        case 'countUnreadMessages':
            (new MessageController())->countUnread();
            break;

        case 'sendMessage':
            (new MessageController())->send();
            break;

        case 'account':
            (new UserController())->show();
            break;

        case 'editAccount':
            (new UserController())->edit();
            break;

        case 'updateAccount':
            (new UserController())->update();
            break;

        case 'updateAvatar':
            (new UserController())->updateAvatar();
            break;

        case 'signup':
            (new UserController())->signUp();
            break;

        case 'register':
            (new UserController())->register();
            break;

        case 'signin':
            (new UserController())->signIn();
            break;

        case 'login':
            (new UserController())->logIn();
            break;

        case 'logout':
            (new UserController())->logOut();
            break;

        default:
            throw new Exception("Action '$action' inconnue ou indisponible.");
    }
} catch (Exception $e) {
    error_log('Erreur de navigation : ' . $e->getMessage());

    $code = 404;
    http_response_code($code);

    $view = new View('Erreur '. $code, ['code' => $code]);
    $view->render('error');
}
