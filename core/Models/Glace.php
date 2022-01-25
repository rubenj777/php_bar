<?php

namespace Models;

require_once "AbstractModel.php";

class Glace extends AbstractModel
{
    protected string $tableName = "glaces";

    /**
     * ajoute un nouveau cocktail dans la bdd
     * @param string $description
     * @param string $image
     * @return void
     */
    public function save(string $description, string $image)
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (description, image) VALUES (:description, :image)");
        $sql->execute([
            'description' => $description,
            'image' => $image,
        ]);
        redirect('glaces.php');
    }
}