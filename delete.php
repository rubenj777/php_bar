<?php

require_once "db.php";

$id = null;

if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
    $id = $_POST['id'];
}

if (!$id) {
    die("Erreur");
}


$sql = $pdo->prepare("SELECT * FROM cocktails WHERE id = :cocktail_id");
$sql->execute(["cocktail_id" => $id]);
$cocktail = $sql->fetch();


if (!$coktail) {
    header('Location: index.php?info=errDel');
    exit();
}

if ($id == $cocktail['id']) {
    $query = $pdo->prepare("DELETE FROM cocktails WHERE id = :cocktail_id");
    $query->execute([
        'cocktail_id' => $id
    ]);
    header("Location: index.php");
}
