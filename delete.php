<?php

require_once "db.php";

$id = null;

if (!empty($_POST['delete']) && ctype_digit($_POST['delete'])) {
    $id = $_POST['delete'];
}

if (!$id) {
    die("Erreur");
}

$query = $pdo->prepare("DELETE FROM cocktails WHERE id = :id");
$query->execute([
    'id' => $id
]);


header("Location: index.php");
