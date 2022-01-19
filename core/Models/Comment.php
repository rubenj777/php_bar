<?php

// require_once "../libraries/db.php";
// require_once dirname(__FILE__) . "/../libraries/db.php";
require_once "Pdo.php";

class Comment extends Db
{
    public function __construct()
    {
        parent::__construct();
        $this->pdo = $this->getPdo();
    }

    /**
     * trouver tous les commentaires d'un cocktail
     * renvoie un tableau contenant les commentaires
     * @param integer $cocktail_id
     * @return array|bool
     */
    public function findAllCommentsByCocktail(int $cocktail_id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM comments WHERE cocktail_id = :cocktail_id");
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
    public function saveComment(string $author, string $content, int $cocktail_id): void
    {
        $sql = $this->pdo->prepare("INSERT INTO comments (author, content, cocktail_id) VALUES (:author, :content, :cocktail_id)");
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
    public function findCommentById(int $comment_id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM comments WHERE id = :comment_id");
        $sql->execute(["comment_id" => $comment_id]);
        $comment = $sql->fetch();
        return $comment;
    }


    /**
     * supprime un commentaire de la bdd
     * @param integer $comment_id
     */
    public function removeComment(int $comment_id): void
    {
        $sql = $this->pdo->prepare("DELETE FROM comments WHERE id = :comment_id");
        $sql->execute([
            'comment_id' => $comment_id
        ]);
    }
}
