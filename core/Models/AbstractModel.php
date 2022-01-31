<?php

namespace Models;

abstract class AbstractModel
{
    protected $pdo;
    protected string $tableName;
    private $model;

    public function getModel()
    {
        return $this->model;
    }


    public function __construct()
    {
        $this->pdo = \Database\PdoMySql::getPdo();
    }

    /**
     * retourn un element par son id
     * renvoie un tableau avec un element
     * @param integer 
     * @return array|bool
     */
    public function findById(int $id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE id = :id");
        $sql->execute(["id" => $id]);
        $sql->setFetchMode(\PDO::FETCH_CLASS, get_class($this));
        $element = $sql->fetch();
        return $element;
    }


    /**
     * retourne un tableau contenant tous les elements
     * tous les champs de la table sql en question
     * @return array $elements
     */
    public function findAll(): array
    {
        $sql = $this->pdo->query("SELECT * FROM {$this->tableName}");
        $elements = $sql->fetchAll(\PDO::FETCH_CLASS, get_class($this));

        return $elements;
    }

    /**
     * supprime un element de la bdd par son id
     * @param integer $id
     */
    public function remove(int $id): void
    {
        $sql = $this->pdo->prepare("DELETE FROM {$this->tableName} WHERE id = :id");
        $sql->execute([
            'id' => $id
        ]);
    }


    // public function save($elements)
    // {
    //     $model = $this->getModel();
    //     foreach ($elements as $element) {
    //         $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} ({$this->element}) VALUES ({$this->element})");
    //         $sql->execute([
    //             'option' => $this->element
    //         ]);
    //     }
    // }



    // /**
    //  * ajoute un nouveau cocktail dans la bdd
    //  * @param Cocktail $cocktail
    //  * @return void
    //  */
    // public function save(Cocktail $cocktail)
    // {
    //     $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (name, image, ingredients) VALUES (:name, :image, :ingredients)");
    //     $sql->execute([
    //         'name' => $cocktail->name,
    //         'image' => $cocktail->image,
    //         'ingredients' => $cocktail->ingredients,
    //     ]);
    // }

}
