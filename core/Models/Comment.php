<?php

require_once "Model.php";

class Comment extends Model
{
    protected string $table = "comments";

    /**
     * trouver tous les commentaires d'un cocktail
     * renvoie un tableau contenant les commentaires
     * @param integer $cocktail_id
     * @return array|bool
     */
    public function findAllByCocktail(int $cocktail_id)
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
    public function save(string $author, string $content, int $cocktail_id): void
    {
        $sql = $this->pdo->prepare("INSERT INTO comments (author, content, cocktail_id) VALUES (:author, :content, :cocktail_id)");
        $sql->execute([
            'author' => $author,
            'content' => $content,
            'cocktail_id' => $cocktail_id,
        ]);
    }
}
