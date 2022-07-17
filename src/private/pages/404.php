<?php

include_once('../private/page.php');

class not_found extends page {

    protected function request() {      
        $this->set_template('404');
    }
}

$run = not_found::getInstance();
$run->run();