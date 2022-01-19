<?php

require_once "core/Models/Cocktail.php";
require_once "core/Models/Comment.php";
require_once "core/libraries/tools.php";

$id = null;

if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
}

if (!$id) {
    redirect('index.php?info=noId');
}

$modelCocktail = new Cocktail();
$cocktail = $modelCocktail->findCocktailById($id);

if (!$cocktail) {
    redirect('index.php?info=noId');
}

$modelComment = new Comment();
$comments = $modelComment->findAllCommentsByCocktail($cocktail['id']);

$pageTitle = $cocktail['name'];
render('cocktails/show', compact('cocktail', 'comments', 'pageTitle'));
