<?php
class ShopsController extends AppController {
    public $helpers = array('Html', 'Form');
    
    public function index () {
        $this->set('shops', $this->Shop->find('all'));
        $this->render();
    }
}