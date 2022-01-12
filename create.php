<?php

require_once "db.php";

$name = null;
$image = null;
$ingredients = null;

if (!empty($_POST['name']) && !empty($_POST['image']) && !empty($_POST['ingredients'])) {
    $name = htmlspecialchars($_POST['name']);
    $image = htmlspecialchars($_POST['image']);
    $ingredients = htmlspecialchars($_POST['ingredients']);
};



if ($name && $image && $ingredients) {

    $sql = $pdo->prepare("INSERT INTO cocktails (name, image, ingredients) VALUES (:name, :image, :ingredients)");
    $sql->execute([
        'name' => $name,
        'image' => $image,
        'ingredients' => $ingredients,
    ]);
    $id = $pdo->lastInsertId();
    header("Location: cocktail.php?id=$id");
    exit();
}

$pageTitle = "Créer un cocktail";

ob_start();

require_once "templates/cocktails/create.html.php";

$pageContent = ob_get_clean();

require_once "templates/layout.html.php";
