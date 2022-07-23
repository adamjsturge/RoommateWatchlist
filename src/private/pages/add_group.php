<?php

include_once(__DIR__ . '/../library/maindb.php');

use AS\library\maindb;
use AS\infra\page;

class add_group extends page {

    protected function request() {  
        $this->set_template('add_group');
        $this->data['pageTitle'] = 'New Group';
        
        if (!empty($_POST)) {
            if (empty($_POST['new-group-name'])) {
                return;
            }
            $db = new maindb;
            $query = $db->prepare('
            insert into groups (group_name)
            values (:groupname)
            returning id
            ');
            $query->execute([':groupname' => $_POST['new-group-name']]);
            $results = $query->fetch(PDO::FETCH_ASSOC);
            $groupId = $results['id'];
    
            $query2 = $db->prepare('
            insert into group_members (group_id, user_id)
            values(:groupid, :userid)
            ');
            $query2->execute([':groupid' => $groupId, ':userid' =>$_SESSION['user_id']]);
        }
    }

    protected function is_auth() {
        return true;
    }
}