<?php

require_once "db.php";

$sql = $pdo->query("SELECT * FROM cocktails");
$cocktails = $sql->fetchAll();
$pageTitle = "Tous les cocktails";


// debut de la memoire tampon
ob_start();

require_once "templates/cocktails/index.html.php";

// on vide la mémoire tampon dans cette variable
$pageContent = ob_get_clean();

require_once "templates/layout.html.php";
