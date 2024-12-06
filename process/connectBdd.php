<?php

class PDOMySQLConnector
{
    private static $mysqlClient;

    public static function getClient()
    {
        if (self::$mysqlClient == null) {
            self::$mysqlClient = new PDO('mysql:host=localhost;dbname=devNdi;charset=utf8', 'webserv', 'jlpab');
        }
        return self::$mysqlClient;
    }
}