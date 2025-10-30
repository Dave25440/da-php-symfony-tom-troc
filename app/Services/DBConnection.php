<?php

namespace App\Services;

class DBConnection
{
    private static ?self $instance = null;
    private \PDO $db;

    private function __construct()
    {
        $this->db = new \PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
            DB_USER,
            DB_PASSWORD
        );

        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    }

    private function __clone() {}

    public function __wakeup() {}

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection(): \PDO
    {
        return $this->db;
    }

    public function query(string $sql, ?array $params = null): \PDOStatement
    {
        if ($params === null) {
            $stmt = $this->db->query($sql);
        } else {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
        }

        return $stmt;
    }
}
