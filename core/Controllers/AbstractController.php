<?php

namespace Controllers;


require_once "core/Models/Info.php";
require_once "core/Models/Cocktail.php";
require_once "core/Models/Comment.php";
require_once "core/Models/Glace.php";

abstract class AbstractController
{
    protected object $defaultModel;
    protected $defaultModelName;

    public function __construct()
    {
        $this->defaultModel = new $this->defaultModelName();
    }
}
