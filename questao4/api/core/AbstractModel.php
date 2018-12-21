<?php

namespace Core;

require_once __DIR__ . '/DatabaseConnection.php';

abstract class AbstractModel
{
    protected $connDb;

    public function __construct()
    {
        $this->connDb = DatabaseConnection::getConnection();
    }
}