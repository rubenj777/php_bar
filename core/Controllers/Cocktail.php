<?php

namespace Controllers;

class Cocktail extends AbstractController
{

    protected $defaultModelName = \Models\Cocktail::class;

    /**
     * affiche l'accueil des cocktails
     */
    public function index()
    {

        $cocktails = $this->defaultModel->findAll();

        $pageTitle = "Tous les cocktails";

        return $this->render('cocktails/index', compact('cocktails', 'pageTitle'));
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


        $cocktail = $this->defaultModel->findById($id);

        if (!$cocktail) {
            return $this->redirect(["type" => "cocktail", "action" => "index", "info" => "noId"]);
        }

        $modelComment = new \Models\Comment();
        $comments = $modelComment->findAllByCocktail($cocktail->id);

        $pageTitle = $cocktail->name;
        return $this->render('cocktails/show', compact('cocktail', 'comments', 'pageTitle'));
    }


    /**
     * creation nouveau cocktail
     */
    public function new()
    {
        $name = null;
        $image = null;
        $ingredients = null;

        if (!empty($_POST['name']) && !empty($_POST['image']) && !empty($_POST['ingredients'])) {
            $name = htmlspecialchars($_POST['name']);
            $image = htmlspecialchars($_POST['image']);
            $ingredients = htmlspecialchars($_POST['ingredients']);
        }

        if ($name && $image && $ingredients) {
            $this->defaultModel->save($name, $image, $ingredients);
            return $this->redirect(['action' => 'cocktails', 'type' => 'index']);
        }

        return $this->render("cocktails/create", ["pageTitle" => "Nouveau cocktail"]);
    }

    /**
     * edition
     * @return void
     */
    public function edit()
    {
        $pageTitle = "Modifier le cocktail";
        $id = null;
        $cocktail = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }

        if ($id) {
            $cocktail = $this->defaultModel->findById($id);
        }

        $name = null;
        $image = null;
        $ingredients = null;
        $idToEdit = null;

        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $idToEdit = $_POST['id'];
        }

        if (!empty($_POST['name']) && !empty($_POST['image']) && !empty($_POST['ingredients'])) {
            $name = htmlspecialchars($_POST['name']);
            $image = htmlspecialchars($_POST['image']);
            $ingredients = htmlspecialchars($_POST['ingredients']);
        }

        if ($name && $image && $ingredients && $idToEdit) {
            $this->defaultModel->update($name, $image, $ingredients, $idToEdit);

            return $this->redirect([
                "type" => "cocktail",
                "action" => "show",
                "id" => $idToEdit
            ]);
        }

        return $this->render("cocktails/edit", ["pageTitle" => $pageTitle, "cocktail" => $cocktail]);
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
        return $this->redirect(['type' => 'cocktail', 'action' => 'index']);
    }
}
