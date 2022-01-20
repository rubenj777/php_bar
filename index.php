<?php

require_once "core/libraries/tools.php";
require_once "core/Models/Cocktail.php";

// controller

$modelCocktail = new Cocktail();
$cocktails = $modelCocktail->findAll();

$pageTitle = "Tous les cocktails";

render('cocktails/index', compact('cocktails', 'pageTitle'));
