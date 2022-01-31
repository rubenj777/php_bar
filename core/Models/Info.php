<?php

namespace Models;

class Info extends AbstractModel
{
    protected string $tableName = "infos";
    private int $id;
    private string $description;

    // GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    // SETTERS
    public function setDescription($description)
    {
        $this->description = $description;
    }


    /**
     * ajoute nouveau info dans la bdd
     * @param Info $info
     * @return void
     */
    public function save(Info $info)
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (description) VALUES (:description)");
        $sql->execute([
            'description' => $info->description,
        ]);
    }


    /**
     * update un info dans la bdd
     * @param string $description
     * @param int $id
     * @return void
     */
    public function update(Info $info)
    {
        $sql = $this->pdo->prepare("UPDATE {$this->tableName} SET description = :description WHERE id = :id");
        $sql->execute([
            'description' => $info->description,
            'id' => $info->id,
        ]);
    }
}
