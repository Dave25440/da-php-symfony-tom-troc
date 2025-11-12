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
                WHERE book.is_exchangeable = 1
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

    public function findById(int $id, ?int $userId = null): ?Book
    {
        $sql = 'SELECT book.id, book.user_id, book.title, book.author, book.cover_image, book.description, book.is_exchangeable
                FROM book
                WHERE id = :id';

        $params['id'] = $id;

        if ($userId === null) {
            $sql .= ' AND is_exchangeable = 1';
        } else {
            $sql .= ' AND (is_exchangeable = 1 OR user_id = :user_id)';
            $params['user_id'] = $userId;
        }

        $stmt = $this->db->query($sql, $params);
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
                WHERE (book.title LIKE :search
                    OR book.author LIKE :search
                    OR user.nickname LIKE :search)
                    AND book.is_exchangeable = 1
                ORDER BY book.id DESC';

        $params = ['search' => '%' . $search . '%'];

        $stmt = $this->db->query($sql, $params);
        $books = [];

        while ($data = $stmt->fetch()) {
            $books[] = Book::fromArray($data);
        }

        return $books;
    }

    public function findBySearchForJson(string $search): array
    {
        $books = $this->findBySearch($search);

        // Transforme chaque objet Book en tableau associatif
        return array_map(function($book) {
            return [
                'id' => $book->getId(),
                'user_id' => $book->getUserId(),
                'title' => $book->getTitle(),
                'author' => $book->getAuthor(),
                'cover_image' => $book->getCoverImage(),
                'is_exchangeable' => $book->isExchangeable(),
                'user_nickname' => $book->getUserNickname()
            ];
        }, $books);
    }

    public function findByUserId(int $userId, bool $isOwner = false): array
    {
        $sql = 'SELECT book.id, book.user_id, book.title, book.author, book.cover_image, book.description, book.is_exchangeable
                FROM book
                WHERE book.user_id = :user_id';

        if (!$isOwner) {
            $sql .= ' AND book.is_exchangeable = 1';
        }

        $sql .= ' ORDER BY book.id DESC';

        $stmt = $this->db->query($sql, ['user_id' => $userId]);
        $books = [];

        while ($data = $stmt->fetch()) {
            $books[] = Book::fromArray($data);
        }

        return $books;
    }

    public function add(Book $book): void
    {
        $sql = 'INSERT INTO book (user_id, title, author, cover_image, description, is_exchangeable)
                VALUES (:user_id, :title, :author, :cover_image, :description, :is_exchangeable)';

        $this->db->query($sql, [
            'user_id' => $book->getUserId(),
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(),
            'cover_image' => $book->getCoverImage(),
            'description' => $book->getDescription(),
            'is_exchangeable' => $book->isExchangeable()
        ]);
    }

    public function delete(int $id): void
    {
        $sql = "DELETE
                FROM book
                WHERE id = :id";

        $this->db->query($sql, ['id' => $id]);
    }
}
