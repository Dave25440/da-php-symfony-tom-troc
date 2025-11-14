<?php 

namespace App\Controllers;

use App\Models\Managers\MessageManager;
use App\Views\View;

class MessageController extends AbstractController
{
    public function show(): void
    {
        $this-> checkAuth();

        $messageManager = new MessageManager();
        $conversations = $messageManager->findConversationsByUserId($this->user->getId());

        $contactId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        if ($contactId === 0 && !empty($conversations)) {
            $contactId = (int) $conversations[0]['contact_id'];
        }

        $view = new View('Messagerie', ['conversations' => $conversations, 'contactId' => $contactId]);
        $view->render('chat', 'chat');
    }
}
