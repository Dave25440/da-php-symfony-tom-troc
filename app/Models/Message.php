<?php

namespace App\Models;

class Message extends AbstractModel
{
    private int $authorId;
    private int $receiverId;
    private string $content;
    private bool $isRead = false;

    public function __construct(int $authorId, int $receiverId, string $content)
    {
        parent::__construct();
        $this->authorId = $authorId;
        $this->receiverId = $receiverId;
        $this->content = $content;
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }

    public function getReceiverId(): int
    {
        return $this->receiverId;
    }

    public function setReceiverId(int $receiverId): void
    {
        $this->receiverId = $receiverId;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function isRead(): bool
    {
        return $this->isRead;
    }

    public function setIsRead(bool $isRead): void
    {
        $this->isRead = $isRead;
    }
}
