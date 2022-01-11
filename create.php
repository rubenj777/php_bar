<?php

require_once "db.php";

$pageTitle = "Créer un cocktail";

ob_start();

require_once "templates/cocktails/create.html.php";

$pageContent = ob_get_clean();

if (!empty($_POST['name']) && !empty($_POST['image']) && !empty($_POST['ingredients'])) {

    $name = $_POST['name'];
    $image = $_POST['image'];
    $ingredients = $_POST['ingredients'];

    $sql = $pdo->prepare("INSERT INTO cocktails(name, image, ingredients) VALUES (:name, :image, :ingredients)");
    $sql->execute([
        'name' => $name,
        'image' => $image,
        'ingredients' => $ingredients,
    ]);

    $id = $pdo->lastInsertId();

    header("Location: cocktail.php?id=$id");
};

require_once "templates/layout.html.php";
