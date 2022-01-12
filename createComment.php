<?php

require_once "db.php";

$id = null;
$author = null;
$content = null;

if (!empty($_POST['author']) && !empty($_POST['content']) && !empty($_POST['id']) && ctype_digit($_POST['id'])) {
    $author = htmlspecialchars($_POST['author']);
    $content = htmlspecialchars($_POST['content']);
    $id = $_POST['id'];
}

if (!$id || !$content || !$author) {
    header("Location: cocktail.php?id=$id");
}

$sql = $pdo->prepare("SELECT * FROM cocktails WHERE id = :cocktail_id");
$sql->execute([
    "cocktail_id" => $id
]);
$cocktail = $sql->fetch();

if (!$cocktail) {
    header("Location: index.php?info=noId");
    exit();
}


$sql = $pdo->prepare("INSERT INTO comments (author, content, cocktail_id) VALUES (:author, :content, :cocktail_id)");
$sql->execute([
    'author' => $author,
    'content' => $content,
    'cocktail_id' => $id,
]);
header("Location: cocktail.php?id=$id");
exit();
