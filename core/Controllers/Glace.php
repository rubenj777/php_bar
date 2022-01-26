<?php

namespace Controllers;


require_once "core/Controllers/AbstractController.php";
require_once "core/Models/Glace.php";

class Glace extends AbstractController
{
    protected $defaultModelName = "\Models\Glace";

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
            return $this->redirect('index.php?info=noId');
        }

        $glace = $this->defaultModel->findById($id);

        if (!$glace) {
            return $this->redirect('index.php?info=noId');
        }
        $pageTitle = $glace['description'];
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
            $pageTitle = $glace['description'];
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
            return $this->redirect('glaces.php');
        }

        if ($description && $image) {
            $this->defaultModel->save($description, $image);
            return $this->redirect('glaces.php');
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
            return $this->redirect('index.php?info=noId');
        }

        if (!$this->defaultModel->findById($id)) {
            return $this->redirect('index.php?info=noId');
        }

        $this->defaultModel->remove($id);
        return $this->redirect('glaces.php');
    }
}
