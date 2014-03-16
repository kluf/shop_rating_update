<?php
App::uses('AppModel', 'Model');
class Shop extends AppModel {
    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        ),
        'SiteUrl' => array(
            'rule' => 'notEmpty'
        ),
        'description' => array(
            'rule' => 'notEmpty'
        )
    );

    public function isOwnedBy($shop, $user) {
        return $this->field('id', array('id' => $shop, 'user_id' => $user)) === $shop;
    }
}