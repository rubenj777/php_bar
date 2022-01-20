<?php

require_once "Model.php";

class Sandwich extends Model
{
    protected string $table = "sandwiches";
    protected int $price;

    /**
     * @param string $content
     * @param int $price
     */
    public function save(string $content, int $price): void
    {
        $sql = $this->pdo->prepare("INSERT INTO sandwiches (description, prix) VALUES (:content, :price)");
        $sql->execute([
            'content' => $content,
            'price' => $price,
        ]);
    }
}
