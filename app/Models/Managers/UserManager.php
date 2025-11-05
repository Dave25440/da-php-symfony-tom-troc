<?php

namespace App\Models\Managers;

use App\Models\User;

class UserManager extends AbstractManager
{
    public function findById(int $id): ?User
    {
        $sql = 'SELECT user.id, user.nickname, user.email, user.password, user.avatar, user.created_at
                FROM user
                WHERE id = :id';

        $stmt = $this->db->query($sql, ['id' => $id]);
        $data = $stmt->fetch();

        if ($data) {
            return User::fromArray($data);
        }

        return null;
    }

    public function findByEmail(string $email): ?User
    {
        $sql = 'SELECT user.id, user.nickname, user.email, user.password
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
}
