<?php

namespace App\Services;

class DBConnection
{
    private static ?self $instance = null;
    private \PDO $db;

    private function __construct()
    {
        $this->db = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
            DB_USER,
            DB_PASSWORD
        );

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

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

    private function __clone() {}

    private function __wakeup() {}
}
