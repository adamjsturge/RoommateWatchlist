<?php

include_once(__DIR__ . '/../page.php');

class shop extends page {

    protected function request() {      
        $this->set_template('shop');
        $this->data['length'] = 7;
    }
}

$run = shop::getInstance();
$run->run();