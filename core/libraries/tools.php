<?php

// ces fonctions ne renvoient rien : void
// ce sont des procédures

/**
 * redirige vers l'url passée en paramètre
 * @param string $url
 * @return void
 */
function redirect(string $url): void
{
    header("Location: {$url}");
    exit();
}

/**
 * Génère le rendu de données interpolées dans un template
 * @param string $template
 * @param array $data
 * @return void
 */
function render(string $template, array $data): void
{

    extract($data);

    // debut de la memoire tampon
    ob_start();
    require_once "templates/{$template}.html.php";

    // on vide la mémoire tampon dans cette variable
    $pageContent = ob_get_clean();
    require_once "templates/layout.html.php";
}
