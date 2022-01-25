<?php

namespace Controllers;

require_once "core/Controllers/AbstractController.php";
require_once "core/libraries/tools.php";
require_once "core/Models/Sandwich.php";


class Sandwich extends AbstractController
{

    protected $defaultModelName = "\Models\Sandwich";

    /**
     * affiche l'accueil des sandwiches
     * @return void
     */
    public function index()
    {

        $sandwiches = $this->defaultModel->findAll();

        $pageTitle = "Tous les sandwiches";

        render('sandwiches/index', compact('sandwiches', 'pageTitle'));
    }


    /**
     * affiche un sandwich
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


        $sandwich = $this->defaultModel->findById($id);

        if (!$sandwich) {
            redirect('index.php?info=noId');
        }


        $pageTitle = $sandwich['description'];
        render('sandwiches/show', compact('sandwich', 'pageTitle'));
    }

    /** 
     * afficher le formulaire et traiter la soumission du formulaire
     * @return void
     */
    public function new(): void
    {
        $description = null;
        $prix = null;

        if (!empty($_POST['description']) && !empty($_POST['prix'])) {
            $description = htmlspecialchars($_POST['description']);
            $prix = htmlspecialchars($_POST['prix']);
        }

        if ($description && $prix) {
            $this->defaultModel->save($description, $prix);
            redirect('sandwiches.php');
        }

        render('sandwiches/create', ['pageTitle' => "Nouveau sandwich"]);
    }
    /**
     * supprimer un sandwich de la db
     * @return void
     */
    public function delete(): void
    {
        $id = null;

        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }

        if (!$id) {
            redirect("index.php?info=noId");
        }

        if (!$this->defaultModel->findById($id)) {
            redirect("index.php?info=noId");
        }

        $this->defaultModel->remove($id);
        redirect('sandwiches.php');
    }
}
