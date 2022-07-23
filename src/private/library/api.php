<?php

namespace AS\infra;

include_once('page.php');

abstract class api extends page {
    protected $response = [];

    public function run() {
        if (!$this->is_auth()) {
            $this->redirect($this->auth_redirect);
        }
        $this->request();
        echo json_encode($this->response);
    }
}