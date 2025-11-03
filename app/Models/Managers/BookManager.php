<?php

namespace App\Models\Managers;

use App\Models\Book;

class BookManager extends AbstractManager
{
    public function findAll(?int $limit = null): array
    {
        $sql = 'SELECT book.id, book.user_id, book.title, book.author, book.cover_image, book.is_exchangeable, user.nickname AS user_nickname
                FROM book
                INNER JOIN user ON book.user_id = user.id
                ORDER BY book.id DESC';

        if ($limit !== null) {
            $sql .= ' LIMIT ' . (int)$limit;
        }

        $stmt = $this->db->query($sql);
        $books = [];

        while ($data = $stmt->fetch()) {
            $books[] = Book::fromArray($data);
        }

        return $books;
    }

    public function findById(int $id): ?Book
    {
        $sql = 'SELECT book.id, book.user_id, book.title, book.author, book.cover_image, book.description, book.is_exchangeable
                FROM book
                WHERE id = :id';

        $stmt = $this->db->query($sql, ['id' => $id]);
        $data = $stmt->fetch();

        if ($data) {
            return Book::fromArray($data);
        }

        return null;
    }

    public function findBySearch(string $search): array
    {
        $sql = 'SELECT book.id, book.user_id, book.title, book.author, book.cover_image, book.is_exchangeable, user.nickname AS user_nickname
                FROM book
                INNER JOIN user ON book.user_id = user.id
                WHERE book.title LIKE :search
                    OR book.author LIKE :search
                    OR user.nickname LIKE :search
                ORDER BY book.id DESC';

        $params = ['search' => '%' . $search . '%'];

        $stmt = $this->db->query($sql, $params);
        $books = [];

        while ($data = $stmt->fetch()) {
            $books[] = Book::fromArray($data);
        }

        return $books;
    }
}
