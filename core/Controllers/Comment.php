<?php

namespace Controllers;

require_once "core/Controllers/AbstractController.php";

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
            return $this->redirect("cocktail.php?id={$id}");
        }

        $defaultModel = new \Models\Cocktail();
        $cocktail = $defaultModel->findById($id);

        if (!$cocktail) {
            return $this->redirect("index.php?info=noId");
        }

        $this->defaultModel->save($author, $content, $id);

        return $this->redirect("cocktail.php?id={$id}");
    }

    public function delete(): Response
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
            return $this->redirect("cocktail.php?id={$comment['cocktail_id']}");
        }

        $this->defaultModel->remove($id);

        return $this->redirect("cocktail.php?id={$comment['cocktail_id']}");
    }
}
