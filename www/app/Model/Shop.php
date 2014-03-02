<?php
App::uses('AppModel', 'Model');
class Shop extends AppModel {
    public function isOwnedBy($shop, $user) {
        return $this->field('id', array('id' => $shop, 'user_id' => $user)) === $shop;
    }
}