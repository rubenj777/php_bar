<?php

namespace Models;

class Reaction extends AbstractModel
{
    protected string $tableName = "reactions";
    private int $id;
    private string $author;
    private string $content;
    private int $info_id;

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

    public function getInfoId()
    {
        return $this->info_id;
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

    public function setInfoId($info_id)
    {
        $this->info_id = $info_id;
    }

    /**
     * trouver tous les reactions d'une info
     * renvoie un tableau contenant les reactions
     * @param integer $info_id
     * @return array|bool
     */
    public function findAllByInfo(int $info_id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE info_id = :info_id");
        $sql->execute(["info_id" => $info_id]);
        $reactions = $sql->fetchAll(\PDO::FETCH_CLASS, get_class($this));
        return $reactions;
    }


    /**
     * insert dans la bdd la nouvelle reaction
     * @param Reaction $reaction
     */
    public function save(Reaction $reaction): void
    {

        $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (author, content, info_id) VALUES (:author, :content, :info_id)");
        $sql->execute([
            'author' => $reaction->author,
            'content' => $reaction->content,
            'info_id' => $reaction->info_id
        ]);
    }
}
