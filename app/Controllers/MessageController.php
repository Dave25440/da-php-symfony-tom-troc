<?php 

namespace App\Controllers;

use App\Views\View;

class MessageController extends AbstractController
{
    public function show(): void
    {
        $view = new View('Messagerie');
        $view->render('chat', 'chat');
    }
}
