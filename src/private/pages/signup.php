<?php

include_once(__DIR__ . '/../library/maindb.php');
include_once(__DIR__ . '/../library/userauth.php');

use AS\library\maindb;
use AS\library\userauth;
use AS\infra\page;

class signup extends page {

    protected function request() {      
        $this->set_template('signup');
        if (!empty($_POST)) {
            $results = userauth::signup($_POST['email'], $_POST['password'], $_POST['username']);
            if ($results['result'] == 'success') {
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $results['user_id'];
            } else {
                $this->data['error'] = 'Something went wrong';
            }
        } else {
            $db = new maindb;
            $row = $db->query("SELECT email FROM users WHERE username = 'adamjsturge'");
            $results = $row->fetchColumn();
            $this->data['thing'] = $results;
        }
    }

    protected function is_auth() {
        return empty($_SESSION['logged_in']);
    }
}