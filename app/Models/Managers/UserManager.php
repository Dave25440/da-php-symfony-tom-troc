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
}
