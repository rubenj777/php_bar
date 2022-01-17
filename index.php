<?php

require_once "core/libraries/db.php";
require_once "core/libraries/tools.php";

// controller

$cocktails = findAllCocktails();

$pageTitle = "Tous les cocktails";

render('cocktails/index', compact('cocktails', 'pageTitle'));
