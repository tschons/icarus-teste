<?php

namespace Core;

final class Configuration
{

    private static $data;
    private static $confFile = 'config.ini';

    private static function loadConf()
    {
        try {
            self::$data = parse_ini_file(self::$confFile);
        } catch (\Exception $error) {
            die('Falha ao carregar arquivo de configurações: ' . $error->getMessage());
        }

    }

    public static function getConfiguration($configuration)
    {
        if (is_null(self::$data)) {
            self::loadConf();
        }

        return self::$data[$configuration];
    }
}
