<?php

namespace Controllers;



class Reaction extends AbstractController
{
    protected $defaultModelName = \Models\Reaction::class;

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

            return $this->redirect(["type" => "info", "action" => "index", "info" => "noId"]);
        }

        $this->defaultModel = new \Models\Info();
        $info = $this->defaultModel->findById($id);

        if (!$info) {
            return $this->redirect(["type" => "info", "action" => "index", "info" => "noId"]);
        }


        $this->defaultModel->save($author, $content, $info->id);

        return $this->redirect(["type" => "info", "action" => "show", "id" => $info->id]);
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

        $reaction = $this->defaultModel->findById($id);

        if (!$reaction) {
            return $this->redirect(["type" => "cocktail", "action" => "index", "info" => "noId"]);
        }

        $this->defaultModel->remove($id);

        return $this->redirect(["type" => "info", "action" => "show", "id" => $reaction->info_id]);
    }
}
