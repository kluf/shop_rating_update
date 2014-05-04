<?php
class Group extends AppModel {
    public $actsAs = array('Acl' => array('type' => 'requester', 'enabled' => false));

    public function parentNode() {
        return null;
    }
}