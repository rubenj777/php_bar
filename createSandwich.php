<?php

require_once "core/Models/Sandwich.php";
require_once "core/libraries/tools.php";

$id = null;
$content = null;
$price = null;

if (!empty($_POST['content']) && !empty($_POST['price']) && !empty($_POST['id']) && ctype_digit($_POST['id'])) {
    $content = htmlspecialchars($_POST['content']);
    $price = htmlspecialchars($_POST['price']);
    $id = $_POST['id'];
}

if (!$id || !$content || !$price) {
    redirect("sandwiches.php");
}

$modelSandwich = new Sandwich();
$sandwich = $modelSandwich->save($content, $price);


redirect("sandwiches.php");
