<?php

namespace App\Models\Managers;

abstract class AbstractManager
{
    protected \PDO $db;

    public function __construct() 
    {
        $this->db = DBConnection::getInstance();
    }
}
