<?php

namespace Models;

class Reaction extends AbstractModel
{
    protected string $tableName = "reactions";

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
     * @param string $author
     * @param string $content
     * @param integer $info_id
     */
    public function save(string $author, string $content, int $info_id): void
    {

        $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (author, content, info_id) VALUES (:author, :content, :info_id)");
        $sql->execute([
            'author' => $author,
            'content' => $content,
            'info_id' => $info_id
        ]);
    }
}
