<?php

namespace App;

class Response
{
    /**
     * redirigie vers l'url passée en param
     * @param string $url
     * @return void
     */
    public static function redirect(string $url): void
    {
        header("Location: {$url}");
        exit();
    }
}
