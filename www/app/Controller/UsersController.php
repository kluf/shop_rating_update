<?php
class UsersController extends AppController {

public function login() {
    if ($this->Session->read('Auth.User')) {
        $this->Session->setFlash('You are logged in!');
        return $this->redirect('/');
    }
}

    public function logout() {
        $this->Session->setFlash('Good-Bye');
        $this->redirect($this->Auth->logout());
    }
    public function beforeFilter() {
        parent::beforeFilter();

        // For CakePHP 2.0
        $this->Auth->allow('*');

        // For CakePHP 2.1 and up
        // $this->Auth->allow();
        // $this->Auth->allow('display');
        $this->Auth->allow('index', 'view');
    }

//     public function beforeFilter() {
//     parent::beforeFilter();
//     $this->Auth->allow('initDB'); // We can remove this line after we're finished
// }

public function initDB() {
    $group = $this->User->Group;

    // Allow admins to everything
    $group->id = 1;
    $this->Acl->allow($group, 'controllers');

    // allow managers to posts and widgets
    $group->id = 2;
    $this->Acl->deny($group, 'controllers');
    $this->Acl->allow($group, 'controllers/Posts');
    $this->Acl->allow($group, 'controllers/Widgets');

    // allow users to only add and edit on posts and widgets
    $group->id = 3;
    $this->Acl->deny($group, 'controllers');
    $this->Acl->allow($group, 'controllers/Posts/add');
    $this->Acl->allow($group, 'controllers/Posts/edit');
    $this->Acl->allow($group, 'controllers/Widgets/add');
    $this->Acl->allow($group, 'controllers/Widgets/edit');

    // allow basic users to log out
    $this->Acl->allow($group, 'controllers/users/logout');

    // we add an exit to avoid an ugly "missing views" error message
    echo "all done";
    exit;
}
    // public function beforeFilter() {
    //     parent::beforeFilter();
    //     $this->Auth->allow('add','logout');
    //     $this->Auth->allow();
    // }

    // public function login() {

    //     if ($this->request->is('post')) {
    //         $user = $this->request->data['User']['username'];
    //         if ($this->Auth->login($user)) {
    //             return $this->redirect($this->Auth->redirect());
    //         }
    //         $this->Session->setFlash(__('Invalid username or password, try again'));
    //     }
    // }

    // public function logout() {
    //     return $this->redirect($this->Auth->logout());
    // }

    // public function index() {
    //     $this->User->recursive = 0;
    //     $this->set('users', $this->paginate());
    // }

    // public function view($id = null) {
    //     $this->User->id = $id;
    //     if (!$this->User->exists()) {
    //         throw new NotFoundException(__('Invalid user'));
    //     }
    //     $this->set('user', $this->User->read(null, $id));
    // }

    // public function add() {
    //     if ($this->request->is('post')) {
    //         $this->User->create();
    //         if ($this->User->save($this->request->data)) {
    //             $this->Session->setFlash(__('The user has been saved'));
    //             return $this->redirect(array('action' => 'index'));
    //         }
    //         $this->Session->setFlash(
    //             __('The user could not be saved. Please, try again.')
    //         );
    //     }
    // }

    // public function edit($id = null) {
    //     $this->User->id = $id;
    //     if (!$this->User->exists()) {
    //         throw new NotFoundException(__('Invalid user'));
    //     }
    //     if ($this->request->is('post') || $this->request->is('put')) {
    //         if ($this->User->save($this->request->data)) {
    //             $this->Session->setFlash(__('The user has been saved'));
    //             return $this->redirect(array('action' => 'index'));
    //         }
    //         $this->Session->setFlash(
    //             __('The user could not be saved. Please, try again.')
    //         );
    //     } else {
    //         $this->request->data = $this->User->read(null, $id);
    //         unset($this->request->data['User']['password']);
    //     }
    // }

    // public function delete($id = null) {
    //     $this->request->onlyAllow('post');

    //     $this->User->id = $id;
    //     if (!$this->User->exists()) {
    //         throw new NotFoundException(__('Invalid user'));
    //     }
    //     if ($this->User->delete()) {
    //         $this->Session->setFlash(__('User deleted'));
    //         return $this->redirect(array('action' => 'index'));
    //     }
    //     $this->Session->setFlash(__('User was not deleted'));
    //     return $this->redirect(array('action' => 'index'));
    // }
}