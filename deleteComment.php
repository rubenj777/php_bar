<?php

require_once "core/libraries/db.php";
require_once "core/libraries/tools.php";

$pdo = getPdo();

$id = null;

if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
    $id = $_POST['id'];
}

if (!$id) {
    die("Erreur");
}

$sql = $pdo->prepare("SELECT * FROM comments WHERE id = :comment_id");
$sql->execute(["comment_id" => $id]);
$comment = $sql->fetch();


if (!$comment) {
    redirect("cocktail.php?id={$comment['cocktail_id']}");
}


$query = $pdo->prepare("DELETE FROM comments WHERE id = :comment_id");
$query->execute([
    'comment_id' => $id
]);


redirect("cocktail.php?id={$comment['cocktail_id']}");
