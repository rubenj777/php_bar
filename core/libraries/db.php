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


/**
 * insert dans la bdd le nouveau commentaire
 * @param string $author
 * @param string $content
 * @param integer $id
 */
function saveComment(string $author, string $content, int $cocktail_id): void
{
    $pdo = getPdo();
    $sql = $pdo->prepare("INSERT INTO comments (author, content, cocktail_id) VALUES (:author, :content, :cocktail_id)");
    $sql->execute([
        'author' => $author,
        'content' => $content,
        'cocktail_id' => $cocktail_id,
    ]);
}

/**
 * trouver le commentaire par son id
 * renvoie un tableau contenant le commentaire
 * @param integer $comment_id
 * @return array|bool
 */
function findCommentById(int $comment_id)
{
    $pdo = getPdo();
    $sql = $pdo->prepare("SELECT * FROM comments WHERE id = :comment_id");
    $sql->execute(["comment_id" => $comment_id]);
    $comment = $sql->fetch();
    return $comment;
}


/**
 * supprime un commentaire de la bdd
 * @param integer $comment_id
 */
function removeComment(int $comment_id): void
{
    $pdo = getPdo();
    $sql = $pdo->prepare("DELETE FROM comments WHERE id = :comment_id");
    $sql->execute([
        'comment_id' => $comment_id
    ]);
}
