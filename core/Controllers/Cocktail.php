<?php

namespace Controllers;

require_once "core/Controllers/AbstractController.php";
require_once "core/libraries/tools.php";
require_once "core/Models/Comment.php";
require_once "core/Models/Cocktail.php";


class Cocktail extends AbstractController
{

    protected $defaultModelName = "\Models\Cocktail";

    /**
     * affiche l'accueil des cocktails
     * @return void
     */
    public function index()
    {

        $cocktails = $this->defaultModel->findAll();

        $pageTitle = "Tous les cocktails";

        render('cocktails/index', compact('cocktails', 'pageTitle'));
    }


    /**
     * affiche un cocktail avec ses commentaires
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


        $cocktail = $this->defaultModel->findById($id);

        if (!$cocktail) {
            redirect('index.php?info=noId');
        }

        $modelComment = new \Models\Comment();
        $comments = $modelComment->findAllByCocktail($cocktail['id']);

        $pageTitle = $cocktail['name'];
        render('cocktails/show', compact('cocktail', 'comments', 'pageTitle'));
    }


    /**
     * creation nouveau cocktail
     * 
     */
    public function new()
    {
        $name = null;
        $image = null;
        $ingredients = null;

        if (!empty($_POST['name']) && !empty($_POST['image']) && !empty($_POST['ingredients'])) {
            $name = htmlspecialchars($_POST['name']);
            $image = htmlspecialchars($_POST['image']);
            $ingredients = htmlspecialchars(($_POST['ingredients']));
        }

        if ($name && $image && $ingredients) {
            $this->defaultModel->save($name, $image, $ingredients);
            redirect('index.php');
        }
        render("cocktails/create", ["pageTitle" => "Nouveau Cocktail"]);
    }

    /**
     * vérifie l'existence d'un cocktail et le supprime de la bdd
     * @return void
     */
    public function delete()
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
        redirect('index.php');
    }
}
