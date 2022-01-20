<?php

require_once "core/Models/Info.php";
require_once "core/libraries/tools.php";

$id = null;
$content = null;

if (!empty($_POST['content']) && !empty($_POST['id']) && ctype_digit($_POST['id'])) {
    $content = htmlspecialchars($_POST['content']);
    $id = $_POST['id'];
}

if (!$id || !$content) {
    redirect("infos.php");
}

$modelInfo = new Info();
$info = $modelInfo->save($content);


redirect("infos.php");
