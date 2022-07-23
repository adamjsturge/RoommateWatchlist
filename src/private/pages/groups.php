<?php

include_once(__DIR__ . '/../library/maindb.php');

use AS\library\maindb;
use AS\infra\page;

class groups extends page {

    protected function request() {  
        $this->set_template('groups');
        $this->data['pageTitle'] = 'My Groups';

        $db = new maindb;
        $query = $db->prepare('
        select groups.group_name 
            from groups
            left join group_members on groups.id=group_members.group_id
            where group_members.user_id = :id;
        ');
        $query->execute([':id' => $_SESSION['user_id']]);
        $results = $query->fetchAll();
        
        $this->data['groups'] = $results;
    }
}