<?php

namespace Controllers;

use App\Response;

require_once "core/Controllers/AbstractController.php";
require_once "core/Models/Sandwich.php";


class Sandwich extends AbstractController
{

    protected $defaultModelName = \Models\Sandwich::class;

    /**
     * affiche l'accueil des sandwiches
     */
    public function index()
    {

        $sandwiches = $this->defaultModel->findAll();

        $pageTitle = "Tous les sandwiches";

        return $this->render('sandwiches/index', compact('sandwiches', 'pageTitle'));
    }


    /**
     * affiche un sandwich
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


        $sandwich = $this->defaultModel->findById($id);

        if (!$sandwich) {
            return $this->redirect('index.php?info=noId');
        }


        $pageTitle = $sandwich['description'];
        return $this->render('sandwiches/show', compact('sandwich', 'pageTitle'));
    }

    /** 
     * afficher le formulaire et traiter la soumission du formulaire
     */
    public function new()
    {
        $pageTitle = "Nouveau sandwich";
        $id = null;
        $sandwich = null;
        $edit = false;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }

        if ($id) {
            $sandwich = $this->defaultModel->findById($id);
        }

        if ($sandwich) {
            $edit = true;
            $pageTitle = $sandwich['description'];
        }

        $description = null;
        $prix = null;

        if (!empty($_POST['description']) && !empty($_POST['prix'])) {
            $description = htmlspecialchars($_POST['description']);
            $prix = htmlspecialchars($_POST['prix']);
        }

        $idToEdit = null;
        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $idToEdit = $_POST['id'];
        }

        if ($description && $prix && $idToEdit) {
            $this->defaultModel->update($description, $prix, $idToEdit);
            return $this->redirect('sandwiches.php');
        }

        if ($description && $prix) {
            $this->defaultModel->save($description, $prix);
            return $this->redirect('sandwiches.php');
        }

        return $this->render('sandwiches/create', ['pageTitle' => $pageTitle, "sandwich" => $sandwich, "edit" => $edit]);
    }

    /**
     * supprimer un sandwich de la db
     */
    public function delete(): Response
    {
        $id = null;

        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }

        if (!$id) {
            return $this->redirect("index.php?info=noId");
        }

        if (!$this->defaultModel->findById($id)) {
            return $this->redirect("index.php?info=noId");
        }

        $this->defaultModel->remove($id);
        return $this->redirect('sandwiches.php');
    }
}
