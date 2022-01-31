<?php

namespace Models;

class Comment extends AbstractModel
{
    protected string $tableName = "comments";
    private int $id;
    private string $author;
    private string $content;
    private int $cocktail_id;

    // GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getCocktailId()
    {
        return $this->cocktail_id;
    }

    // SETTERS
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setCocktailId($cocktail_id)
    {
        $this->cocktail_id = $cocktail_id;
    }


    /**
     * trouver tous les commentaires d'un cocktail
     * renvoie un tableau contenant les commentaires
     * @param integer $cocktail_id
     * @return array|bool
     */
    public function findAllByCocktail(int $cocktail_id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE cocktail_id = :cocktail_id");
        $sql->execute(["cocktail_id" => $cocktail_id]);
        $comments = $sql->fetchAll(\PDO::FETCH_CLASS, get_class($this));
        return $comments;
    }


    /**
     * insert dans la bdd le nouveau commentaire
     * @param Comment $comment
     */
    public function save(Comment $comment): void
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (author, content, cocktail_id) VALUES (:author, :content, :cocktail_id)");
        $sql->execute([
            'author' => $comment->author,
            'content' => $comment->content,
            'cocktail_id' => $comment->cocktail_id
        ]);
    }
}
