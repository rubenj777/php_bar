<?php

// require_once "../libraries/db.php";
// require_once dirname(__FILE__) . "/../libraries/db.php";
require_once "Pdo.php";



class Cocktail extends Db
{
    public function __construct()
    {
        parent::__construct();
        $this->pdo = $this->getPdo();
    }

    /**
     * retourne un tableau contenant tous les cocktails
     * @return array $cocktails
     */
    public function findAllCocktails(): array
    {
        $sql = $this->pdo->query("SELECT * FROM cocktails");
        $cocktails = $sql->fetchAll();
        return $cocktails;
    }


    /**
     * trouver un cocktail par son ID
     * renvoie un tableau contenant un cocktail
     * @param integer $cocktail_id
     * @return array|bool
     */
    public function findCocktailById(int $cocktail_id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM cocktails WHERE id = :cocktail_id");
        $sql->execute(["cocktail_id" => $cocktail_id]);
        $cocktail = $sql->fetch();
        return $cocktail;
    }
}
