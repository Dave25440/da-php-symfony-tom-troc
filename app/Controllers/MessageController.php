<?php 

namespace App\Controllers;

use App\Models\Managers\MessageManager;
use App\Models\Managers\UserManager;
use App\Views\View;

class MessageController extends AbstractController
{
    public function validateContact(int $contactId, int $userId, array $conversations): array
    {
        if ($contactId === $userId) {
            header('Location: index.php?action=chat');
            exit;
        }

        $exists = false;

        foreach ($conversations as $conversation) {
            if ($conversation['contact_id'] === $contactId) {
                $exists = true;
                break;
            }
        }

        return [$contactId, $exists];
    }

    public function show(): void
    {
        $this->checkAuth();

        $userId = $this->user->getId();
        $contactId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        $messageManager = new MessageManager();
        $conversations = $messageManager->findConversationsByUserId($userId);

        [$contactId, $exists] = $this->validateContact($contactId, $userId, $conversations);

        if ($contactId > 0 && !$exists) {
            $userManager = new UserManager();
            $user = $userManager->findById($contactId);

            if ($user) {
                array_unshift($conversations, [
                    'contact_id' => $contactId,
                    'user_nickname' => $user->getNickname(),
                    'user_avatar' => $user->getAvatar(),
                    'content' => 'Nouvelle conversation',
                    'last_date' => date('Y-m-d H:i:s')
                ]);
            }
        }

        if ($contactId === 0 && !empty($conversations)) {
            $contactId = (int) $conversations[0]['contact_id'];
        }

        if ($contactId > 0) {
            $messages = $messageManager->findBetweenUsers($userId, $contactId);
        } else {
            $messages = [];
        }

        $view = new View('Messagerie', [
            'userId' => $userId,
            'contactId' => $contactId,
            'conversations' => $conversations,
            'messages' => $messages
        ]);

        $view->render('chat', 'chat');
    }
}
