<?php

include_once(__DIR__ . '/../page.php');

class signup extends page {

    protected function request() {      
        $this->template_name = 'signup';
        $this->data['thing'] = 'Signup';
    }
}

$run = signup::getInstance();
$run->run();