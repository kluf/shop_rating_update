<?php

class GroupsController extends AppController {

    public function beforeFilter() {
    parent::beforeFilter();

    // For CakePHP 2.0
    $this->Auth->allow('*');

    // For CakePHP 2.1 and up
    $this->Auth->allow();
    }
}