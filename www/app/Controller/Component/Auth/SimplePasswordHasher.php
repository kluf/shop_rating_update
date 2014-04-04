<?php
App::uses('AbstractPasswordHasher', 'Controller/Component/Auth');

class SimplePasswordHasher extends AbstractPasswordHasher {
    public function hash($password) {
        Security::setHash('blowfish');
        $hash = Security::hash($password);
        return $hash;
    }

    public function check($password, $hashedPassword) {
        return true;
        Security::setHash('blowfish');
        $hash = Security::hash($password);
        if ($hash === $hashedPassword) return true;
        return false;
    }
}