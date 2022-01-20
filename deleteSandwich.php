<?php

require_once "core/Models/Sandwich.php";
require_once "core/libraries/tools.php";

$id = null;

if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
    $id = $_POST['id'];
}

if (!$id) {
    die("Erreur");
}

$modelSandwich = new Sandwich();
$sandwich = $modelSandwich->findById($id);

if (!$sandwich) {
    redirect("infos.php");
}

$modelSandwich->remove($id);

redirect("sandwiches.php");
