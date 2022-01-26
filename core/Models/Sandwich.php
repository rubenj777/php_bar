<?php

namespace Models;

require_once "AbstractModel.php";

class Sandwich extends AbstractModel
{
    protected string $tableName = "sandwiches";

    /**
     * @param string $description
     * @param int $prix
     */
    public function save(string $description, int $prix): void
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (description, prix) VALUES (:description, :prix)");
        $sql->execute([
            'description' => $description,
            'prix' => $prix,
        ]);
    }

    /**
     * update un sandwich dans la bdd
     * @param string $description
     * @param int $prix
     * @return void
     */
    public function update(string $description, int $prix, string $id)
    {
        $sql = $this->pdo->prepare("UPDATE {$this->tableName} SET description = :description, prix = :prix WHERE id = :id");
        $sql->execute([
            'description' => $description,
            'prix' => $prix,
            'id' => $id,
        ]);
    }
}
