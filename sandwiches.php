<?php

require_once "core/libraries/tools.php";
require_once "core/Models/Sandwich.php";

$modelSandwich = new Sandwich();
$sandwiches = $modelSandwich->findAll();

$pageTitle = "Nos sandwiches";

render("sandwiches/index", compact('sandwiches', 'pageTitle'));
