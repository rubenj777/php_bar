<?php

namespace Controllers;

class Info extends AbstractController
{

    protected $defaultModelName = \Models\Info::class;

    /**
     * affiche l'accueil des cocktails
     */
    public function index()
    {

        $infos = $this->defaultModel->findAll();

        $pageTitle = "Les infos";

        return $this->render('infos/index', compact('infos', 'pageTitle'));
    }


    /**
     * affiche un cocktail avec ses commentaires
     */
    public function show()
    {
        $id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }

        if (!$id) {
            return $this->redirect(["type" => "cocktail", "action" => "index", "info" => "noId"]);
        }


        $info = $this->defaultModel->findById($id);

        if (!$info) {
            return $this->redirect(["type" => "cocktail", "action" => "index", "info" => "noId"]);
        }

        $modelReaction = new \Models\Reaction();
        $reactions = $modelReaction->findAllByInfo($info->id);

        $pageTitle = $info->description;
        return $this->render('infos/show', compact('info', 'reactions', 'pageTitle'));
    }


    public function new()
    {
        $pageTitle = "Nouvelle info";
        $id = null;
        $info = null;
        $edit = false;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }

        if ($id) {
            $info = $this->defaultModel->findById($id);
        }

        if ($info) {
            $edit = true;
            $pageTitle = $info->description;
        }

        $description = null;

        if (!empty($_POST['description'])) {
            $description = htmlspecialchars($_POST['description']);
        }

        $idToEdit = null;
        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $idToEdit = $_POST['id'];
        }

        if ($description && $idToEdit) {
            $this->defaultModel->update($description, $idToEdit);
            return $this->redirect(["type" => "info", "action" => "index"]);
        }

        if ($description) {
            $this->defaultModel->save($description);
            return $this->redirect(["type" => "info", "action" => "index"]);
        }

        return $this->render('infos/create', ['pageTitle' => $pageTitle, "info" => $info, "edit" => $edit]);
    }

    /**
     * vérifie l'existence d'un cocktail et le supprime de la bdd
     */
    public function delete(): Response
    {
        $id = null;
        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }

        if (!$id) {
            return $this->redirect(['type' => 'cocktail', 'info' => 'noId']);
        }

        if (!$this->defaultModel->findById($id)) {
            return $this->redirect(['type' => 'cocktail', 'info' => 'noId']);
        }

        $this->defaultModel->remove($id);
        return $this->redirect(['type' => 'info', 'action' => 'index']);
    }
}
