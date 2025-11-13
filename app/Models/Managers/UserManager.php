<?php

namespace App\Models\Managers;

use App\Models\User;

class UserManager extends AbstractManager
{
    public function findById(int $id): ?User
    {
        $sql = 'SELECT id, nickname, email, password, avatar, created_at
                FROM user
                WHERE id = :id';

        $stmt = $this->db->query($sql, ['id' => $id]);
        $data = $stmt->fetch();

        if ($data) {
            return User::fromArray($data);
        }

        return null;
    }

    public function findByNickname(string $nickname): ?User
    {
        $sql = 'SELECT id, nickname, email, password
                FROM user
                WHERE nickname = :nickname';

        $stmt = $this->db->query($sql, ['nickname' => $nickname]);
        $data = $stmt->fetch();

        if ($data) {
            return User::fromArray($data);
        }

        return null;
    }

    public function findByEmail(string $email): ?User
    {
        $sql = 'SELECT id, nickname, email, password
                FROM user
                WHERE email = :email';

        $stmt = $this->db->query($sql, ['email' => $email]);
        $data = $stmt->fetch();

        if ($data) {
            return User::fromArray($data);
        }

        return null;
    }

    public function add(User $user): void
    {
        $sql = 'INSERT INTO user (nickname, email, password)
                VALUES (:nickname, :email, :password)';

        $this->db->query($sql, [
            'nickname' => $user->getNickname(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword()
        ]);
    }

    public function update(User $user): void
    {
        $sql = 'UPDATE user
                SET nickname = :nickname, email = :email';

        $params = [
            'id' => $user->getId(),
            'nickname' => $user->getNickname(),
            'email' => $user->getEmail()
        ];

        if ($user->getPassword()) {
            $sql .= ', password = :password';
            $params['password'] = $user->getPassword();
        }

        $sql .= ' WHERE id = :id';

        $this->db->query($sql, $params);
    }

    public function updateAvatar(int $id, string $avatar): void
    {
        $sql = "UPDATE user
                SET avatar = :avatar
                WHERE id = :id";

        $this->db->query($sql, ['id' => $id, 'avatar' => $avatar]);
    }
}
