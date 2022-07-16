<?php

include_once('start.php');

abstract class page {
    protected $data;
    protected string $template_name;

    static $instance;
    
    private function __construct() {
    }
    
    public static function getInstance() {
        if (static::$instance instanceof static) {
            return static::$instance;
        }
        
        return static::$instance = new static();
    }

    public function run() {
        if (!$this->is_auth()) {
            $this->redirect('index');
        }
        $this->request();
        $template_name = $this->template_name;
        start_twig("$template_name.twig", $this->data);
    }

    protected function is_auth() {
        return true;
    }

    protected function request() {  
    }

    protected function redirect($page) {
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("Location: http://$host$uri/$page.php");
    }
}