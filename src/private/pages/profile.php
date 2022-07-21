<?php

use AS\infra\page;

class profile extends page {

    protected function request() {  
        $this->set_template('profile');
        $this->data['thing'] = 'profile';
    }
}