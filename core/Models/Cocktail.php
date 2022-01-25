<?php

namespace Models;

require_once "AbstractModel.php";

class Cocktail extends AbstractModel
{
    protected string $tableName = "cocktails";


    /**
     * ajoute un nouveau cocktail dans la bdd
     * @param string $name
     * @param string $image
     * @param string $ingredients
     * @return void
     */
    public function save(string $name, string $image, string $ingredients)
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (name, image, ingredients) VALUES (:name, :image, :ingredients)");
        $sql->execute([
            'name' => $name,
            'image' => $image,
            'ingredients' => $ingredients,
        ]);
        redirect('index.php');
    }
}
