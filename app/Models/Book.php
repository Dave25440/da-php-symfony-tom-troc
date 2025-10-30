<?php

namespace App\Models;

class Book extends AbstractModel
{
    private int $userId;
    private string $title;
    private string $author;
    private ?string $coverImage = null;
    private ?string $description = null;
    private bool $isExchangeable = false;
    private ?\DateTime $updatedAt = null;
    private ?string $userNickname = null;

    public function __construct(int $userId, string $title, string $author)
    {
        parent::__construct();
        $this->userId = $userId;
        $this->title = $title;
        $this->author = $author;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getCoverImage(): ?string
    {
        return $this->coverImage;
    }

    public function setCoverImage(?string $coverImage): void
    {
        $this->coverImage = $coverImage;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function isExchangeable(): bool
    {
        return $this->isExchangeable;
    }

    public function setIsExchangeable(bool $isExchangeable): void
    {
        $this->isExchangeable = $isExchangeable;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string|\DateTime|null $updatedAt): void
    {
        if (is_string($updatedAt)) {
            $updatedAt = new \DateTime($updatedAt);
        }

        $this->updatedAt = $updatedAt;
    }

    public function getUserNickname(): ?string
    {
        return $this->userNickname;
    }

    public function setUserNickname(?string $userNickname): void
    {
        $this->userNickname = $userNickname;
    }
}
