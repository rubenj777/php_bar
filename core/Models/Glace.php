<?php

namespace Models;

class Glace extends AbstractModel
{
    protected string $tableName = "glaces";
    private int $id;
    private string $description;
    private string $image;

    // GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImage()
    {
        return $this->image;
    }

    // SETTERS
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }


    /**
     * ajoute un nouveau cocktail dans la bdd
     * @param Glace $glace
     * @return void
     */
    public function save(Glace $glace)
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (description, image) VALUES (:description, :image)");
        $sql->execute([
            'description' => $glace->description,
            'image' => $glace->image,
        ]);
    }

    /**
     * update une glace dans la bdd
     * @param string $description
     * @param string $image
     * @param int $id
     * @return void
     */
    public function update(string $description, string $image, string $id)
    {
        $sql = $this->pdo->prepare("UPDATE {$this->tableName} SET description = :description, image = :image WHERE id = :id");
        $sql->execute([
            'description' => $description,
            'image' => $image,
            'id' => $id,
        ]);
    }
}
