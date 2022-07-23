<?php

require_once(__DIR__ . "/../private/library/page.php");
require_once(dirname(__FILE__). '/../vendor/autoload.php');

session_start(); //session_destroy(); To logout someone

$is_api = str_starts_with($_SERVER['REQUEST_URI'], '/api/');

$magic_number = $is_api ? 5 : 1;

$request = substr($_SERVER['REQUEST_URI'], 1);

$whitelist = [ //Key is the url and value is the classname of file
    '404' => 'not_found',
    'login' => 'login',
    'shop' => 'shop',
    'signup' => 'signup',
    'profile' => 'profile',
    'logout' => 'logout',
    'my_groups' => 'my_groups'
];

$api_whitelist = [ //Key is the url and value is the classname of file
    'add_group_member' => 'add_group_member',
    'add_group' => 'add_group',
];


$not_found = false;
if (!$is_api && empty($whitelist[$request])) {
    $not_found = true;
}

if ($is_api && empty($api_whitelist[$request])) {
    $not_found = true;
}
$classname = $whitelist[$request]?? 'not_found';
// if (!is_subclass_of($classname, 'infra\page')) {
//     $not_found = true;
// }

if (!$not_found) {
    if ($is_api) {
        require_once(__DIR__ . "/../private/api/$request.php");
    } else {
        require_once(__DIR__ . "/../private/pages/$request.php");
    }
    $page = new $classname; 
    $page->run();
} else {
    if ($is_api) {
        echo json_encode(['error' => 'API not found.']);
    } else {
        require_once(__DIR__ . "/../private/pages/404.php");
        $page = new not_found; 
        $page->run();
    }
}