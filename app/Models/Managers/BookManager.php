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
            $book = new Book(
                $data['user_id'],
                $data['title'],
                $data['author']
            );

            unset($data['user_id'], $data['title'], $data['author']);
            $book->hydrate($data);
            $books[] = $book;
        }

        return $books;
    }
}
