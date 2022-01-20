<?php

require_once "core/Models/Comment.php";
require_once "core/libraries/tools.php";

$id = null;

if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
    $id = $_POST['id'];
}

if (!$id) {
    die("Erreur");
}

$modelComment = new Comment();
$comment = $modelComment->findById($id);

if (!$comment) {
    redirect("cocktail.php?id={$comment['cocktail_id']}");
}

$modelComment->remove($id);

redirect("cocktail.php?id={$comment['cocktail_id']}");
