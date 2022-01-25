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
        $sql = $this->pdo->prepare("INSERT INTO sandwiches (description, prix) VALUES (:description, :prix)");
        $sql->execute([
            'description' => $description,
            'prix' => $prix,
        ]);
    }
}
