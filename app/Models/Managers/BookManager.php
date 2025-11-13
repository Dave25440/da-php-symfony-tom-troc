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
        $sql = 'SELECT id, user_id, title, author, cover_image, description, is_exchangeable
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
        $sql = 'SELECT id, user_id, title, author, cover_image, description, is_exchangeable
                FROM book
                WHERE user_id = :user_id';

        if (!$isOwner) {
            $sql .= ' AND is_exchangeable = 1';
        }

        $sql .= ' ORDER BY id DESC';

        $stmt = $this->db->query($sql, ['user_id' => $userId]);
        $books = [];

        while ($data = $stmt->fetch()) {
            $books[] = Book::fromArray($data);
        }

        return $books;
    }

    public function countByCoverImage(string $coverImage, int $id = 0): int
    {
        $sql = 'SELECT COUNT(*)
                FROM book
                WHERE cover_image = :cover_image';
        
        $params = ['cover_image' => $coverImage];

        if ($id) {
            $sql .= ' AND id != :id';
            $params['id'] = $id;
        }

        $stmt = $this->db->query($sql, $params);
        $count = $stmt->fetchColumn();

        return (int) $count;
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

    public function update(Book $book): void
    {
        $sql = 'UPDATE book
                SET title = :title, author = :author, cover_image = :cover_image, description = :description, is_exchangeable = :is_exchangeable
                WHERE id = :id';

        $params = [
            'id' => $book->getId(),
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(),
            'cover_image' => $book->getCoverImage(),
            'description' => $book->getDescription(),
            'is_exchangeable' => $book->isExchangeable(),
        ];

        $this->db->query($sql, $params);
    }

    public function delete(int $id): void
    {
        $sql = "DELETE
                FROM book
                WHERE id = :id";

        $this->db->query($sql, ['id' => $id]);
    }
}
