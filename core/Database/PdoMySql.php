<?php

namespace Database;

class PdoMySql
{
    /**
     * Retourne un objet de la classe Pdo pour intéragir avec la DB
     * @return PDO
     */
    public static function getPdo(): \PDO
    {
        $pdo = new \PDO("mysql:host=localhost;dbname=bar;charset=utf8", "bar", "ruben", [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
        ]);
        return $pdo;
    }
}
