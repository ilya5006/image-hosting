<?php

namespace App;

class Database
{
    private static $connectionProperties;

    private static $connection;

    private static function initConnection()
    {
        if (! static::$connectionProperties['host']) {
            throw new \Exception('Укажите адрес хоста базы данных');
        }

        if (! static::$connectionProperties['login']) {
            throw new \Exception('Укажите логин базы данных');
        }

        if (! static::$connectionProperties['password']) {
            throw new \Exception('Укажите пароль базы данных');
        }

        if (! static::$connectionProperties['dbname']) {
            throw new \Exception('Укажите имя базы данных');
        }

        static::$connection = new \mysqli(
            static::$connectionProperties['host'],
            static::$connectionProperties['login'],
            static::$connectionProperties['password'],
            static::$connectionProperties['dbname']
        );
    }

    public static function getConnection()
    {
        if (empty(static::$connection)) {
            static::initConnection();
        }

        return static::$connection;
    }

    public static function setConnectionProperties(
        string $host,
        string $login, 
        string $password,
        string $dbname
    ) {
        static::$connectionProperties['host'] = $host;
        static::$connectionProperties['login'] = $login;
        static::$connectionProperties['password'] = $password;
        static::$connectionProperties['dbname'] = $dbname;
    }
}
