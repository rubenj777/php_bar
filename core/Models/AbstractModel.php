<?php

namespace Models;

require_once "core/Database/PdoMySql.php";

abstract class AbstractModel
{
    protected $pdo;
    protected string $tableName;

    public function __construct()
    {
        $this->pdo = \Database\PdoMySql::getPdo();
    }

    /**
     * retourn un element par son id
     * renvoie un tableau avec un element
     * @param integer 
     * @return array|bool
     */
    public function findById(int $id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE id = :id");
        $sql->execute(["id" => $id]);
        $element = $sql->fetch();
        return $element;
    }


    /**
     * retourne un tableau contenant tous les elements
     * tous les champs de la table sql en question
     * @return array $elements
     */
    public function findAll(): array
    {
        $sql = $this->pdo->query("SELECT * FROM {$this->tableName}");
        $elements = $sql->fetchAll();
        return $elements;
    }

    /**
     * supprime un element de la bdd par son id
     * @param integer $id
     */
    public function remove(int $id): void
    {
        $sql = $this->pdo->prepare("DELETE FROM {$this->tableName} WHERE id = :id");
        $sql->execute([
            'id' => $id
        ]);
    }
}