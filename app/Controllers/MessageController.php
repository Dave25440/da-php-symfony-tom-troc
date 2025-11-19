<?php 

namespace App\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\Managers\MessageManager;
use App\Models\Managers\UserManager;
use App\Views\View;

class MessageController extends AbstractController
{
    protected function loadConversation(int $contactId, array $conversations): ?array
    {
        foreach ($conversations as $conversation) {
            if ($conversation['contact_id'] === $contactId) {
                return $conversation;
            }
        }

        return null;
    }

    protected function loadContact(int $contactId, int $userId): User
    {
        if ($contactId <= 0) {
            throw new \Exception('Le contact est introuvable.');
        } elseif ($contactId === $userId) {
            header('Location: index.php?action=chat');
            exit;
        }

        $userManager = new UserManager();
        $user = $userManager->findById($contactId);

        if ($user === null) {
            throw new \Exception('Le contact est introuvable.');
        }

        return $user;
    }

    public function show(): void
    {
        $this->checkAuth();

        $userId = $this->user->getId();
        $contactId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        $messageManager = new MessageManager();
        $conversations = $messageManager->findConversationsByUserId($userId);

        if ($contactId === 0 && !empty($conversations)) {
            $contactId = (int) $conversations[0]['contact_id'];
        }

        $activeContact = $this->loadConversation($contactId, $conversations);

        if ($contactId !== 0 && $activeContact === null) {
            $user = $this->loadContact($contactId, $userId);

            $activeContact = [
                'contact_id' => $user->getId(),
                'user_nickname' => $user->getNickname(),
                'user_avatar' => $user->getAvatar(),
                'content' => 'Nouvelle conversation',
                'last_date' => date('Y-m-d H:i:s')
            ];

            array_unshift($conversations, $activeContact);
        }

        $messages = $messageManager->findBetweenUsers($userId, $contactId);

        $error = $_SESSION['error'] ?? '';
        $content = $_SESSION['content'] ?? '';
        unset($_SESSION['error'], $_SESSION['content']);

        $view = new View('Messagerie', [
            'userId' => $userId,
            'contactId' => $contactId,
            'activeContact' => $activeContact,
            'conversations' => $conversations,
            'messages' => $messages,
            'error' => $error,
            'content' => $content
        ]);

        $view->render('chat', 'chat');
    }

    public function send(): void
    {
        $this->checkAuth();

        $userId = $this->user->getId();
        $contactId = isset($_POST['contact_id']) ? (int) $_POST['contact_id'] : 0;
        $content = trim($_POST['content'] ?? '');

        $user = $this->loadContact($contactId, $userId);

        if (empty($content)) {
            $_SESSION['error'] = 'Aucun message envoyé.';
        } elseif (strlen($content) > 1000) {
            $_SESSION['error'] = 'Le message ne doit pas dépasser 1000 caractères.';
        }

        if (isset($_SESSION['error'])) {
            $_SESSION['content'] = $content;

            header('Location: index.php?action=chat&id=' . $contactId);
            exit;
        }

        $message = new Message($userId, $contactId, $content);

        $messageManager = new MessageManager();
        $messageManager->add($message);

        header('Location: index.php?action=chat&id=' . $contactId);
        exit;
    }
}
