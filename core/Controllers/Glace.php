<?php

namespace Controllers;

class Glace extends AbstractController
{
    protected $defaultModelName = \Models\Glace::class;

    /**
     * affiche les glaces
     */
    public function index()
    {
        return $this->render('glaces/index', ['pageTitle' => 'Nos glaces', 'glaces' => $this->defaultModel->findAll()]);
    }

    /**
     * affichage d'une glace
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

        $glace = $this->defaultModel->findById($id);

        if (!$glace) {
            return $this->redirect(["type" => "cocktail", "action" => "index", "info" => "noId"]);
        }
        $pageTitle = $glace->getDescription();
        return $this->render('glaces/show', compact('glace', 'pageTitle'));
    }
    /** 
     * afficher le formulaire et traiter la soumission du formulaire
     */
    public function new()
    {
        $pageTitle = "Nouvelle glace";

        $id = null;
        $glace = null;
        $edit = false;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }

        if ($id) {
            $glace = $this->defaultModel->findById($id);
        }

        if ($glace) {
            $edit = true;
            $pageTitle = $glace->getDescription();
        }

        $description = null;
        $image = null;
        if (!empty($_POST['description']) && !empty($_POST['image'])) {
            $description = htmlspecialchars($_POST['description']);
            $image = htmlspecialchars($_POST['image']);
        }

        $idToEdit = null;
        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $idToEdit = $_POST['id'];
        }

        if ($description && $image && $idToEdit) {
            $this->defaultModel->update($description, $image, $idToEdit);
            return $this->redirect(["type" => "glace", "action" => "index"]);
        }




        if ($description && $image) {
            $glace = new \Models\Glace();
            $glace->setDescription($description);
            $glace->setImage($image);
            $this->defaultModel->save($glace);
            return $this->redirect(["type" => "glace", "action" => "index"]);
        }

        return $this->render('glaces/create', ['pageTitle' => $pageTitle, "glace" => $glace, "edit" => $edit]);
    }

    /**
     * supprimer une glace
     */
    public function delete(): Response
    {
        $id = null;
        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }

        if (!$id) {
            return $this->redirect(["type" => "cocktail", "action" => "index", "info" => "noId"]);
        }

        if (!$this->defaultModel->findById($id)) {
            return $this->redirect(["type" => "cocktail", "action" => "index", "info" => "noId"]);
        }

        $this->defaultModel->remove($id);
        return $this->redirect(["type" => "cocktail", "action" => "index"]);
    }
}
