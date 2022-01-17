<?php

/**
 * Retourne un objet de la classe Pdo pour intéragir avec la DB
 * @return PDO
 */
function getPdo(): PDO
{
    $pdo = new PDO("mysql:host=localhost;dbname=bar;charset=utf8", "bar", "ruben", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
}


/**
 * retourne un tableau contenant tous les cocktails
 * @return array $cocktails
 */
function findAllCocktails(): array
{
    $pdo = getPdo();
    $sql = $pdo->query("SELECT * FROM cocktails");
    $cocktails = $sql->fetchAll();
    return $cocktails;
}


/**
 * trouver un cocktail par son ID
 * renvoie un tableau contenant un cocktail
 * @param integer $cocktail_id
 * @return array|bool
 */
function findCocktailById(int $cocktail_id)
{
    $pdo = getPdo();
    $sql = $pdo->prepare("SELECT * FROM cocktails WHERE id = :cocktail_id");
    $sql->execute(["cocktail_id" => $cocktail_id]);
    $cocktail = $sql->fetch();
    return $cocktail;
}

/**
 * trouver tous les commentaires d'un cocktail
 * renvoie un tableau contenant les commentaires
 * @param integer $cocktail_id
 * @return array|bool
 */
function findAllCommentsByCocktail(int $cocktail_id)
{
    $pdo = getPdo();
    $sql = $pdo->prepare("SELECT * FROM comments WHERE cocktail_id = :cocktail_id");
    $sql->execute(["cocktail_id" => $cocktail_id]);
    $comments = $sql->fetchAll();
    return $comments;
}
