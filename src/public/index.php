<?php

include_once('../private/page.php');

class index extends page {

    protected function request() {      
        $this->template_name = 'index';
        $this->data['length'] = 7;
    }
}

$run = index::getInstance();
$run->run();