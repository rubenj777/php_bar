<?php

require_once "core/Models/Info.php";
require_once "core/libraries/tools.php";

$id = null;

if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
    $id = $_POST['id'];
}

if (!$id) {
    die("Erreur");
}

$modelInfo = new Info();
$info = $modelInfo->findById($id);

if (!$info) {
    redirect("infos.php");
}

$modelInfo->remove($id);

redirect("infos.php");
