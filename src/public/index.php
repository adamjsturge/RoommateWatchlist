<?php

require_once(__DIR__ . "/../private/page.php");
require_once(dirname(__FILE__). '/../vendor/autoload.php');

$request = substr($_SERVER['REQUEST_URI'], 1);

$whitelist = [ //Key is the url and value is the classname of file
    '404' => 'not_found',
    'login' => 'login',
    'shop' => 'shop',
    'signup' => 'signup',
];


$not_found = false;
if (empty($whitelist[$request])) {
    $not_found = true;
}
$classname = $whitelist[$request];
// if (!is_subclass_of($classname, 'infra\page')) {
//     $not_found = true;
// }

if (!$not_found) {
    require_once(__DIR__ . "/../private/pages/$request.php");
    $page = new $classname; 
    $page->run();
} else {
    require_once(__DIR__ . "/../private/pages/404.php");
    $page = new not_found; 
    $page->run();
}