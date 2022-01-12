<?php

require_once "db.php";

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
    header("Location: cocktail.php?id=$comment[cocktail_id]");
    exit();
}


$query = $pdo->prepare("DELETE FROM comments WHERE id = :comment_id");
$query->execute([
    'comment_id' => $id
]);

header("Location: cocktail.php?id=$comment[cocktail_id]");
exit();
