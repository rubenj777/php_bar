<?php

abstract class Db
{
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = $this->getPdo();
    }

    /**
     * Retourne un objet de la classe Pdo pour intéragir avec la DB
     * @return PDO
     */
    public function getPdo(): PDO
    {
        $pdo = new PDO("mysql:host=localhost;dbname=bar;charset=utf8", "bar", "ruben", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $pdo;
    }
}
