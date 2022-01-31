<?php

namespace Models;

class Sandwich extends AbstractModel
{
    protected string $tableName = "sandwiches";
    private int $id;
    private string $description;
    private int $prix;

    //GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    //SETTERS
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @param Sandwich $sandwich
     */
    public function save(Sandwich $sandwich): void
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (description, prix) VALUES (:description, :prix)");
        $sql->execute([
            'description' => $sandwich->description,
            'prix' => $sandwich->prix,
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
