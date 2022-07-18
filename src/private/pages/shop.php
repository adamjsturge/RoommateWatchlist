<?php

use AS\infra\page;

class shop extends page {

    protected function request() {      
        $this->set_template('shop');
        $this->data['length'] = 7;
    }
}