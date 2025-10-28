<?php 

namespace App\Controllers;

use App\Views\View;

class ChatController
{
    public function showChat() : void
    {
        $view = new View('Messagerie');
        $view->render('chat', 'chat');
    }
}
