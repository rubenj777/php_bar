<?php

namespace Controllers;

require_once "core/Controllers/AbstractController.php";
require_once "core/libraries/tools.php";
require_once "core/Models/Glace.php";

class Glace extends AbstractController
{
    protected $defaultModelName = "\Models\Glace";

    /**
     * affiche les glaces
     * @return void
     */
    public function index(): void
    {
        $glaces = $this->defaultModel->findAll();
        $pageTitle = "Nos glaces";
        render('glaces/index', compact('glaces', 'pageTitle'));
    }

    /**
     * affichage d'une glace
     * @return void
     */
    public function show()
    {
        $id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }

        if (!$id) {
            redirect('index.php?info=noId');
        }

        $glace = $this->defaultModel->findById($id);

        if (!$glace) {
            redirect('index.php?info=noId');
        }
        $pageTitle = $glace['description'];
        render('glaces/show', compact('glace', 'pageTitle'));
    }
    /** 
     * afficher le formulaire et traiter la soumission du formulaire
     * @return void
     */
    public function new(): void
    {
        $description = null;
        $image = null;

        if (!empty($_POST['description']) && !empty($_POST['image'])) {
            $description = htmlspecialchars($_POST['description']);
            $image = htmlspecialchars($_POST['image']);
        }

        if ($description && $image) {
            $this->defaultModel->save($description, $image);
            redirect('glaces.php');
        }

        render('glaces/create', ['pageTitle' => "Nouvelle glace"]);
    }

    /**
     * supprimer une glace
     * @return void
     */
    public function delete(): void
    {
        $id = null;
        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }

        if (!$id) {
            redirect('index.php?info=noId');
        }

        if (!$this->defaultModel->findById($id)) {
            redirect('index.php?info=noId');
        }

        $this->defaultModel->remove($id);
        redirect('glaces.php');
    }
}
