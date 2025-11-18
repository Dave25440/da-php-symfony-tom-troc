<?php

namespace App\Models\Managers;

use App\Models\Message;

class MessageManager extends AbstractManager
{
    public function findConversationsByUserId(int $userId): array
    {
        // Récupère le pseudo et l'avatar de chaque contact avec le contenu et la date du dernier message échangé
        $sql = 'SELECT user.id AS contact_id, user.nickname, user.avatar, message.content, message.created_at AS last_date
                FROM (
                    SELECT
                        CASE
                            WHEN author_id = :user_id THEN receiver_id
                            ELSE author_id
                        END AS contact_id,
                        MAX(created_at) AS last_date
                    FROM message
                    WHERE author_id = :user_id OR receiver_id = :user_id
                    GROUP BY contact_id
                ) conversation
                INNER JOIN message ON (
                    (message.author_id = :user_id AND message.receiver_id = conversation.contact_id)
                    OR (message.author_id = conversation.contact_id AND message.receiver_id = :user_id)
                ) AND message.created_at = conversation.last_date
                INNER JOIN user ON user.id = conversation.contact_id
                ORDER BY last_date DESC';

        $stmt = $this->db->query($sql, ['user_id' => $userId]);
        $conversations = [];

        while ($data = $stmt->fetch()) {
            $conversations[] = [
                'contact_id' => (int) $data['contact_id'],
                'user_nickname' => $data['nickname'],
                'user_avatar' => $data['avatar'],
                'content' => $data['content'],
                'last_date' => $data['last_date']
            ];
        }

        return $conversations;
    }

    public function findBetweenUsers(int $userId, int $contactId): array
    {
        $sql = 'SELECT author_id, receiver_id, content, created_at
                FROM message
                WHERE (author_id = :user_id AND receiver_id = :contact_id)
                OR (author_id = :contact_id AND receiver_id = :user_id)
                ORDER BY created_at ASC
                LIMIT 15';

        $stmt = $this->db->query($sql, ['user_id' => $userId, 'contact_id' => $contactId]);
        $messages = [];

        while ($data = $stmt->fetch()) {
            $messages[] = Message::fromArray($data);
        }

        return $messages;
    }

    public function add(Message $message): void
    {
        $sql = 'INSERT INTO message (author_id, receiver_id, content)
                VALUES (:author_id, :receiver_id, :content)';

        $this->db->query($sql, [
            'author_id' => $message->getAuthorId(),
            'receiver_id' => $message->getReceiverId(),
            'content' => $message->getContent()
        ]);
    }
}
