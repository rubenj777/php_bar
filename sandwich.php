<?php

require_once "core/Models/Sandwich.php";
require_once "core/libraries/tools.php";

$id = null;

if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
}

if (!$id) {
    redirect('index.php?info=noId');
}

$modelSandwich = new Sandwich();
$sandwich = $modelSandwich->findById($id);

if (!$sandwich) {
    redirect('index.php?info=noId');
}

$pageTitle = $sandwich['description'];
render('sandwiches/show', compact('sandwich', 'pageTitle'));
