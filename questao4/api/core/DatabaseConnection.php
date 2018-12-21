<?php

namespace Core;

require_once __DIR__ . '/Configuration.php';

final class DatabaseConnection
{

    private static $conn;

    private function __construct()
    {
        try {

            self::$conn = new \mysqli(
                Configuration::getConfiguration('db-host'),
                Configuration::getConfiguration('db-user'),
                Configuration::getConfiguration('db-pass'),
                Configuration::getConfiguration('db-name')
            );

            self::$conn->set_charset("utf8");
        } catch(\Exception $error) {
            die('Falha ao conectar-se ao banco de dados: ' . $error->getMessage());
        }
    }

    public static function getConnection()
    {

        if (!isset(self::$conn)) {
            new DatabaseConnection();
        }

        return self::$conn;
    }
}
