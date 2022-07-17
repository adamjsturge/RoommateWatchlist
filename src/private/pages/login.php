<?php

include_once('../private/page.php');

class login extends page {

    protected function request() {      
        $this->template_name = 'login';
        $this->data['thing'] = 'Loginz';
    }
}

$run = login::getInstance();
$run->run();