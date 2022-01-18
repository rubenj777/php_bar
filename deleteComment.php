<?php

require_once "core/libraries/db.php";
require_once "core/libraries/tools.php";

$id = null;

if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
    $id = $_POST['id'];
}

if (!$id) {
    die("Erreur");
}

$comment = findCommentById($id);

if (!$comment) {
    redirect("cocktail.php?id={$comment['cocktail_id']}");
}

removeComment($id);

redirect("cocktail.php?id={$comment['cocktail_id']}");
