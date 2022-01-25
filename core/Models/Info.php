<?php

namespace Models;

require_once "AbstractModel.php";

class Info extends AbstractModel
{
    protected string $tableName = "infos";

    /**
     * insert dans la bdd la nouvelle info
     * @param string $content
     * @return void
     */
    public function save(string $content): void
    {
        $sql = $this->pdo->prepare("INSERT INTO infos (description) VALUES (:content)");
        $sql->execute([
            'content' => $content,
        ]);
    }
}
