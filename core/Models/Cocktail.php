<?php

namespace Models;

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
    }


    /**
     * update un cocktail dans la bdd
     * @param string $name
     * @param string $image
     * @param string $ingredients
     * @return void
     */
    public function update(string $name, string $image, string $ingredients, string $id)
    {
        $sql = $this->pdo->prepare("UPDATE {$this->tableName} SET name = :name, image = :image, ingredients = :ingredients WHERE id = :id");
        $sql->execute([
            'name' => $name,
            'image' => $image,
            'ingredients' => $ingredients,
            'id' => $id,
        ]);
    }
}
