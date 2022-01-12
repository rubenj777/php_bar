<?php

require_once "db.php";

$id = null;

if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
}

$sql = $pdo->prepare("SELECT * FROM cocktails WHERE id = :cocktail_id");
$sql->execute(["cocktail_id" => $id]);
$cocktail = $sql->fetch();

if (!$id) {
    header('Location: index.php?info=noId');
    exit();
}

$sql = $pdo->prepare("SELECT * FROM comments WHERE cocktail_id = :cocktail_id");
$sql->execute(["cocktail_id" => $id]);
$comments = $sql->fetchAll();

$pageTitle = $cocktail['name'];

ob_start();

require_once "templates/cocktails/show.html.php";

$pageContent = ob_get_clean();

require_once "templates/layout.html.php";
