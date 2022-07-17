<?php
ini_set('display_errors', '1');
ini_set('error_log', '/var/log/php_error_log');
error_reporting(E_ALL &~ E_STRICT);

function connect_twig()
{
    require_once(dirname(__FILE__). '/../vendor/autoload.php');

    $options = array(
        'path' => '../public',
        'cache' => '/tmp/',
        'auto_reload' => true,
    );

    $loader = new \Twig\Loader\FilesystemLoader($options['path']);
    $twig = new \Twig\Environment($loader, [
        'cache' => $options['cache'],
        'auto_reload' => $options['auto_reload'],
        'autoescape' => true,
    ]);

    return $twig;
}

function start_twig(string $template_name, array $data){
    $full = ['data' => $data];
    $twig = connect_twig();
    $template = $twig->loadTemplate($template_name);
    echo $template->render($data);
}