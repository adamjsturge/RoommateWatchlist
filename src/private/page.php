<?php

include_once('start.php');

abstract class page {
    protected $data = [];
    private string $template_name;

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
            $this->redirect('404');
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
        header("Location: http://$host/$page");
    }

    protected function set_template($template_name) {
        $this->template_name = $template_name;
    }
}