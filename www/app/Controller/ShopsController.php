<?php

class ShopsController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('Session');

    public function index () {
        $this->set('shops', $this->Shop->find('all'));
        $this->render();
    }

    public function add() {
    if ($this->request->is('post')) {
        $this->request->data['Post']['user_id'] = $this->Auth->user('id');
        if ($this->Shop->save($this->request->data)) {
            $this->Session->setFlash(__('Your post has been saved.', 'default', array('class' => 'alert alert-success')));
            return $this->redirect(array('action' => 'index'));
        }
    }
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid shop'));
        }

        $shop = $this->Shop->findById($id);
        if (!$shop) {
            throw new NotFoundException(__('Invalid shop'));
        }
        $this->set('shop', $shop);
    }

    public function isAuthorized($user) {
        // All registered users can add posts !!! hard code
        if ($this->action === 'add' || $this->action === 'edit' || $this->action === 'delete') {
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

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid shop'));
        }

        $shop = $this->Shop->findById($id);
        if (!$shop) {
            throw new NotFoundException(__('Invalid shop'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Shop->id = $id;
            if ($this->Shop->save($this->request->data)) {
                $this->Session->setFlash(__('Your shop has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your shop.'));
        }

        if (!$this->request->data) {
            $this->request->data = $shop;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Shop->delete($id)) {
            $this->Session->setFlash(
                __('The post with id: %s has been deleted.', h($id))
            );
            return $this->redirect(array('action' => 'index'));
        }
    }
}

