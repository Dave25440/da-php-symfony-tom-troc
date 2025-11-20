<?php

namespace App\Services;

use App\Models\Managers\MessageManager;

class UserNotification
{
    private MessageManager $messageManager;
    private ?int $unreadMessages = null;

    public function __construct()
    {
        $this->messageManager = new MessageManager();
    }

    public function getUnreadMessages(?int $userId = null): int
    {
        if ($this->unreadMessages === null) {
            if ($userId !== null && $userId > 0) {
                $this->unreadMessages = $this->messageManager->countUnreadByUserId($userId);
            } else {
                $this->unreadMessages = 0;
            }
        }

        return $this->unreadMessages;
    }
}
