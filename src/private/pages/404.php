<?php

include_once(__DIR__ . '/../page.php');

class not_found extends page {

    protected function request() {      
        $this->set_template('404');
    }
}

$run = not_found::getInstance();
$run->run();