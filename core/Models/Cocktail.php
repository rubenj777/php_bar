<?php

namespace Models;

class Cocktail extends AbstractModel
{
    protected string $tableName = "cocktails";
    private int $id;
    private string $name;
    private string $image;
    private string $ingredients;

    // GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getIngredients()
    {
        return $this->ingredients;
    }

    // SETTERS
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }



    /**
     * ajoute un nouveau cocktail dans la bdd
     * @param Cocktail $cocktail
     * @return void
     */
    public function save(Cocktail $cocktail)
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (name, image, ingredients) VALUES (:name, :image, :ingredients)");
        $sql->execute([
            'name' => $cocktail->name,
            'image' => $cocktail->image,
            'ingredients' => $cocktail->ingredients,
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
