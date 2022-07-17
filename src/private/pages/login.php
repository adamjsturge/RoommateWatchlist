<?php

include_once(__DIR__ . '/../page.php');

class login extends page {

    protected function request() {  
        $this->set_template('login');
        $this->data['thing'] = 'Loginz';
    }
}

$run = login::getInstance();
$run->run();