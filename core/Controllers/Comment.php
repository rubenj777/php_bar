<?php

namespace Controllers;



class Comment extends AbstractController
{
    protected $defaultModelName = \Models\Comment::class;

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
            return $this->redirect(["type" => "cocktail", "action" => "index", "info" => "noId"]);
        }

        $this->typeCocktail = new \Models\Cocktail();
        $cocktail = $this->typeCocktail->findById($id);

        if (!$cocktail) {
            return $this->redirect(["type" => "cocktail", "action" => "index", "info" => "noId"]);
        }

        $this->defaultModel->save($author, $content, $id);

        return $this->redirect(["type" => "cocktail", "action" => "show", "id" => $cocktail->id]);
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
            return $this->redirect(["type" => "cocktail", "action" => "index", "info" => "noId"]);
        }

        $this->defaultModel->remove($id);

        return $this->redirect(["type" => "cocktail", "action" => "show", "id" => $comment->cocktail_id]);
    }
}
