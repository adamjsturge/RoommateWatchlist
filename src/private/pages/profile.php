<?php

include_once(__DIR__ . '/../library/maindb.php');
include_once(__DIR__ . '/../library/userauth.php');

use AS\library\maindb;
use AS\infra\page;

class profile extends page {

    protected function request() {  
        $this->set_template('profile');

        $db = new maindb;
        $row = $db->query("SELECT email FROM users WHERE username = 'rarson'");
        $results = $row->fetchColumn();
        $this->data['email'] = $results;
    }
}