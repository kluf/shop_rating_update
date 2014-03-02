<?php
class ShopsController extends AppController {
    public $helpers = array('Html', 'Form');
    
    public function index () {
        $this->set('shops', $this->Shop->find('all'));
        $this->render();
    }

    public function add() {
    if ($this->request->is('shop')) {
        $this->request->data['Post']['user_id'] = $this->Auth->user('id');
        if ($this->Shop->save($this->request->data)) {
            $this->Session->setFlash(__('Your post has been saved.'));
            return $this->redirect(array('action' => 'index'));
        }
    }
    }

    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }
        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = $this->request->params['pass'][0];
            if ($this->Shop->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
        }
    

