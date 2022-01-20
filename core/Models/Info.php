<?php

require_once "Model.php";



class Info extends Model
{
    protected string $table = "infos";

    /**
     * insert dans la bdd le nouveau commentaire
     * @param string $description
     */
    public function save(string $content): void
    {
        $sql = $this->pdo->prepare("INSERT INTO infos (description) VALUES (:content)");
        $sql->execute([
            'content' => $content,
        ]);
    }
}
