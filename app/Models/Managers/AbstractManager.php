<?php

namespace App\Models\Managers;

use App\Services\DBConnection;

abstract class AbstractManager
{
    protected DBConnection $db;

    public function __construct() 
    {
        $this->db = DBConnection::getInstance();
    }
}
