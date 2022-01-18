<?php

require_once "core/libraries/db.php";
require_once "core/libraries/tools.php";

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

saveComment($author, $content, $id);

redirect("cocktail.php?id={$id}");
