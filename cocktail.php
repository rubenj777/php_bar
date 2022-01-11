<?php

require_once "db.php";

$id = null;

if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
}

if (!$id) {
    die('Je ne trouve pas ce cocktail...');
}

$sql = $pdo->prepare("SELECT * FROM cocktails WHERE id = :cocktail_id");
$sql->execute(["cocktail_id" => $id]);
$cocktail = $sql->fetch();

$pageTitle = $cocktail['name'];

ob_start();

require_once "templates/cocktails/show.html.php";

$pageContent = ob_get_clean();

require_once "templates/layout.html.php";
