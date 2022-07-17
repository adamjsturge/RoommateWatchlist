<?php

$request = substr($_SERVER['REQUEST_URI'], 1);

$whitelist = [
    'login' => 1,
    'shop' => 1,
    'signup' => 1,
];


if (!empty($whitelist[$request])) {
    require __DIR__ . "/../private/pages/$request.php";
} else {
    require __DIR__ . "/../private/pages/404.php";
}