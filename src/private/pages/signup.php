<?php

include_once(__DIR__ . '/../library/maindb.php');
include_once(__DIR__ . '/../library/userauth.php');

use library\maindb;
use library\userauth;
use infra\page;

class signup extends page {

    protected function request() {      
        $this->set_template('signup');
        
        if (!empty($_POST)) {
            userauth::signup($_POST['email'], $_POST['password'], $_POST['username']);
        } else {
            $db = new maindb;
            $row = $db->query("SELECT email FROM users WHERE username = 'adamjsturge'");
            $results = $row->fetchColumn();
            $this->data['thing'] = $results;
        }
    }
}