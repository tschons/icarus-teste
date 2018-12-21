<?php

final class Configuration
{
    private static $confFile = './myConf.ini';
    private static $data;

    private static function loadConf()
    {
        try{
            self::$data = parse_ini_file(self::$confFile);
        }catch (Exception $error) {
            die('Falha ao carregar arquivo de configurações: ' . $error->getMessage());
        }

    }

    public static function getConf($configuration)
    {
        if(is_null(self::$data)) {
            self::loadConf();
        }

        return self::$data[$configuration];
    }
}

final class DatabaseConnection
{
    private static $conn;

    private function __construct() {
        try{

            self::$conn = new \mysqli(
                Configuration::getConf('host'),
                Configuration::getConf('user'),
                Configuration::getConf('password'),
                Configuration::getConf('db-name')
            );

        }catch(Exception $error) {
            die('Falha ao conectar-se ao banco de dados: ' . $error->getMessage());
        }
    }

    // Design Pattern Singleton
    public static function getConnection() {

        if (!isset(self::$conn)) {
            new DatabaseConnection();
        }
        return self::$conn;
    }
}

abstract class Persistent
{
    protected $dbConn;

    public function __construct()
    {
        $this->dbConn = DatabaseConnection::getConnection();
    }
}

final class MyUserClass extends Persistent
{
    public function getUserList()
    {
        $results = $this->dbConn->query(
            'select
                name
            from
                user
            order by
                name asc'
        );

        return $results;
    }
}
