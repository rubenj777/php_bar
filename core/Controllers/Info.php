<?php

namespace Controllers;

require_once "core/Controllers/AbstractController.php";
require_once "core/libraries/tools.php";
require_once "core/Models/Info.php";

class Info extends AbstractController
{
    protected $defaultModeName = "\Models\Info";

    public function index()
    {
        $infos = $this->defaultModel->findAll();
        $pageTitle = "Les infos";
        render("infos/index", compact('infos', 'pageTitle'));
    }
}
