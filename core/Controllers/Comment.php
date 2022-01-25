<?php

namespace Controllers;

require_once "core/Controllers/AbstractController.php";
require_once "core/libraries/tools.php";

class Comment extends AbstractController
{
    protected $defaultModelName = "\Models\Comment";

    public function new()
    {
        $id = null;
        $author = null;
        $content = null;

        if (!empty($_POST['author']) && !empty($_POST['content']) && !empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $author = htmlspecialchars($_POST['author']);
            $content = htmlspecialchars($_POST['content']);
            $id = $_POST['id'];
        }

        if (!$id || !$content || !$author) {
            redirect("cocktail.php?id={$id}");
        }

        $defaultModel = new \Models\Cocktail();
        $cocktail = $defaultModel->findById($id);

        if (!$cocktail) {
            redirect("index.php?info=noId");
        }

        $this->defaultModel->save($author, $content, $id);

        redirect("cocktail.php?id={$id}");
    }

    public function delete()
    {
        $id = null;

        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }

        if (!$id) {
            die("Erreur");
        }

        $comment = $this->defaultModel->findById($id);

        if (!$comment) {
            redirect("cocktail.php?id={$comment['cocktail_id']}");
        }

        $this->defaultModel->remove($id);

        redirect("cocktail.php?id={$comment['cocktail_id']}");
    }
}
