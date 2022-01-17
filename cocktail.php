<?php

require_once "core/libraries/db.php";
require_once "core/libraries/tools.php";

$id = null;

if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
}

if (!$id) {
    redirect('index.php?info=noId');
}

$cocktail = findCocktailById($id);

if (!$cocktail) {
    redirect('index.php?info=noId');
}

$comments = findAllCommentsByCocktail($cocktail['id']);

$pageTitle = $cocktail['name'];
render('cocktails/show', compact('cocktail', 'comments', 'pageTitle'));
