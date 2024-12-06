<?php

class PDOMySQLConnector
{
    private static $mysqlClient;

    public static function getClient()
    {
        if (self::$mysqlClient == null) {
            self::$mysqlClient = new PDO('mysql:host=mysql-lanathomiedeposeidon.alwaysdata.net;dbname=lanathomiedeposeidon_prodndi;charset=utf8', '389417', 'jlpab5812');
        }
        return self::$mysqlClient;
    }
}