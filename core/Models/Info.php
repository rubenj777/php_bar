<?php

namespace Models;

class Info extends AbstractModel
{
    protected string $tableName = "infos";


    /**
     * ajoute nouveau info dans la bdd
     * @param string $description
     * @return void
     */
    public function save(string $description)
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (description) VALUES (:description)");
        $sql->execute([
            'description' => $description,
        ]);
    }


    /**
     * update un info dans la bdd
     * @param string $description
     * @param int $id
     * @return void
     */
    public function update(string $description, string $id)
    {
        $sql = $this->pdo->prepare("UPDATE {$this->tableName} SET description = :description WHERE id = :id");
        $sql->execute([
            'description' => $description,
            'id' => $id,
        ]);
    }
}
