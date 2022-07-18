<?php

use infra\page;

class login extends page {

    protected function request() {  
        $this->set_template('login');
        $this->data['thing'] = 'Login';
    }
}