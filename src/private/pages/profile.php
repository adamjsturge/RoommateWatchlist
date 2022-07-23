<?php

include_once(__DIR__ . '/../library/maindb.php');
include_once(__DIR__ . '/../library/userauth.php');

use AS\library\maindb;
use AS\infra\page;

class profile extends page {

    protected function request() {  
        $this->set_template('profile');

        $db = new maindb;
        $query = $db->prepare('SELECT email FROM users WHERE id = :id');
        $query->execute([':id' => $_SESSION['user_id']]);
        $results = $query->fetchColumn();
        
        $this->data['email'] = $results;
    }
}