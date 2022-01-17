<?php

require_once "core/libraries/db.php";
require_once "core/libraries/tools.php";
$pdo = getPdo();

$id = null;
$author = null;
$content = null;

if (!empty($_POST['author']) && !empty($_POST['content']) && !empty($_POST['id']) && ctype_digit($_POST['id'])) {
    $author = htmlspecialchars($_POST['author']);
    $content = htmlspecialchars($_POST['content']);
    $id = $_POST['id'];
}

if (!$id || !$content || !$author) {
    redirect("cocktail.php?id={$id}");
}

$cocktail = findCocktailById($id);

if (!$cocktail) {
    redirect("index.php?info=noId");
}


$sql = $pdo->prepare("INSERT INTO comments (author, content, cocktail_id) VALUES (:author, :content, :cocktail_id)");
$sql->execute([
    'author' => $author,
    'content' => $content,
    'cocktail_id' => $id,
]);

redirect("cocktail.php?id={$id}");
