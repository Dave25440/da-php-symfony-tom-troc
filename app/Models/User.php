<?php

namespace App\Models;

class User extends AbstractModel
{
    private string $nickname;
    private string $email;
    private string $password;
    private ?string $avatar = null;
    private ?\DateTime $updatedAt = null;

    public function __construct(string $nickname, string $email, string $password)
    {
        parent::__construct();
        $this->nickname = $nickname;
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public static function fromArray(array $data): User
    {
        $user = new self($data['nickname'], $data['email'], $data['password']);
        unset($data['nickname'], $data['email'], $data['password']);
        $user->hydrate($data);
        return $user;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Adresse '$email' invalide.");
        }

        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): void
    {
        $this->avatar = $avatar;
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

    public function getMemberSince(): string
    {
        $createdAt = $this->createdAt;

        if ($createdAt === null) {
            return ': durée inconnue';
        }

        $now = new \DateTime();
        $interval = $createdAt->diff($now);

        $months = $interval->m + 12 * $interval->y;

        if ($months < 1) {
            return "moins d'un mois";
        } elseif ($months < 12) {
            return $months . ' mois';
        } else {
            $years = $interval->y;
            return $years . ' an' . ($years > 1 ? 's' : '');
        }
    }
}
