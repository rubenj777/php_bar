<?php

require_once "core/libraries/tools.php";
require_once "core/Models/Glace.php";

$modelGlace = new Glace();
$glaces = $modelGlace->findAll();

$pageTitle = "Nos glaces";

render("glaces/index", compact('glaces', 'pageTitle'));
