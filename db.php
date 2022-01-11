<?php

$pdo = new PDO("mysql:host=localhost;dbname=bar;charset=utf8", "bar", "ruben", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
