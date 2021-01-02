<?php

namespace App;

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'coursework');

class Database
{
    private static $dbh;

    private static function getDbh()
    {
        return static::$dbh;
    }

    private static function setDbh($value)
    {
        static::$dbh = $value;
    }

    private static function connection()
    {
        if (empty(static::getDbh())) {
            try {
                static::setDbh(new \PDO(
                    'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST,
                    DB_USER,
                    DB_PASSWORD
                ));
            } catch (\PDOException $e) {
                echo 'Database connection failed: ' . $e->getMessage();
            }
        }
    }

    public static function select(string $table, string $selector = '*', string $conditionTemplate = '', array $embeddedData = [])
    {
        static::connection();

        $query = 'SELECT ' . $selector . ' FROM ' . $table;
        $query .= ($conditionTemplate != '') ? (' ' . $conditionTemplate) : '';

        $sth = static::$dbh->prepare($query);

        foreach ($embeddedData as $data) {
            $sth->bindParam(...$data);
        }

        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function insert(string $table, string $valuesTemplate, array $embeddedData = [])
    {
        static::connection();

        $query = 'INSERT INTO ' . $table . ' VALUES (' . $valuesTemplate . ')';

        $sth = static::$dbh->prepare($query);

        foreach ($embeddedData as $data) {
            $sth->bindParam(...$data);
        }

        $sth->execute();

        return (int)$sth->errorCode === 0;
    }

    public static function update(string $table, string $settersTemplate, string $conditionTemplate = '', array $embeddedData = [])
    {
        static::connection();

        $query = 'UPDATE ' . $table . ' SET ' . $settersTemplate;
        $query .= ($conditionTemplate != '') ? (' ' . $conditionTemplate) : '';

        $sth = static::$dbh->prepare($query);

        foreach ($embeddedData as $data) {
            $sth->bindParam(...$data);
        }

        $sth->execute();

        return (int)$sth->errorCode === 0;
    }

    public static function delete(string $table, string $conditionTemplate = '', array $embeddedData = [])
    {
        static::connection();

        $query = 'DELETE FROM ' . $table;
        $query .= ($conditionTemplate != '') ? (' ' . $conditionTemplate) : '';

        $sth = static::$dbh->prepare($query);

        foreach ($embeddedData as $data) {
            $sth->bindParam(...$data);
        }

        $sth->execute();

        return (int)$sth->errorCode === 0;
    }
}
