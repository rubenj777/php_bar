<?php

require_once "core/libraries/tools.php";
require_once "core/Models/Info.php";

$modelInfo = new Info();
$infos = $modelInfo->findAll();

$pageTitle = "Les infos fraîches";

render("infos/index", compact('infos', 'pageTitle'));
