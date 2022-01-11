<?php

require_once "db.php";

$name = null;
$image = null;
$ingredients = null;
$id = null;

if (!empty($_POST['name']) && !empty($_POST['image']) && !empty($_POST['ingredients']) && !empty($_POST['id']) && ctype_digit($_POST['id'])) {
    $name = htmlspecialchars($_POST['name']);
    $image = htmlspecialchars($_POST['image']);
    $ingredients = htmlspecialchars($_POST['ingredients']);
    $id = $_POST['id'];
};



if ($name && $image && $ingredients && $id) {

    $sql = $pdo->prepare("UPDATE cocktails SET
    name = :cocktail_name, ingredients = :cocktail_ingredients, image= :cocktail_image
    WHERE id = :cocktail_id
     ");
    $sql->execute([
        'cocktail_name' => $name,
        'cocktail_image' => $image,
        'cocktail_ingredients' => $ingredients,
        'cocktail_id' => $id
    ]);
    header("Location: cocktail.php?id=$id");
}


if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
}

if (!$id) {
    die('Je ne trouve pas ce cocktail...');
}

$sql = $pdo->prepare("SELECT * FROM cocktails WHERE id = :cocktail_id");
$sql->execute(["cocktail_id" => $id]);
$cocktail = $sql->fetch();

$pageTitle = $cocktail['name'];

ob_start();

require_once "templates/cocktails/edit.html.php";

$pageContent = ob_get_clean();

require_once "templates/layout.html.php";
