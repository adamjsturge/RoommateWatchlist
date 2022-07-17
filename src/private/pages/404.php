<?php

include_once('../private/page.php');

class login extends page {

    protected function request() {      
        $this->template_name = '404';
    }
}

$run = login::getInstance();
$run->run();