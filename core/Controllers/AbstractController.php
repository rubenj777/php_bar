<?php

namespace Controllers;


require_once "core/Models/Cocktail.php";
require_once "core/Models/Comment.php";
require_once "core/Models/Glace.php";
require_once "core/App/Response.php";
require_once "core/App/View.php";

abstract class AbstractController
{
    protected object $defaultModel;
    protected $defaultModelName;

    public function __construct()
    {
        $this->defaultModel = new $this->defaultModelName();
    }

    public function redirect($url): Response
    {
        return \App\Response::redirect($url);
    }

    public function render(string $template, array $data)
    {
        return \App\View::render($template, $data);
    }
}
