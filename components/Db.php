<?php

// метод для подключения к БД

class Db
{
    private static $db = null;

    public static function getConnection()
    {
        // подключаем файл с массивом параметров БД

        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8'
        );

        if (self::$db === null) { //реализация SINGLETON

            self::$db = new PDO("mysql:host=" . $params['host'] . ";dbname=" . $params['dbname'], $params['user'], $params['password'], $options);

        }

        return self::$db;
    }
}