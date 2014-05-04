<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
    public $belongsTo = array('Group');
    public $actsAs = array('Acl' => array('type' => 'requester'));

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }

    public function beforeSave($options = array()) {
        $this->data['User']['password'] = AuthComponent::password(
          $this->data['User']['password']
        );
        return true;
    }

}
// App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
// class User extends AppModel {
//     public $validate = array(
//         'username' => array(
//             'required' => array(
//                 'rule' => array('notEmpty'),
//                 'message' => 'A username is required'
//             )
//         ),
//         'password' => array(
//             'required' => array(
//                 'rule' => array('notEmpty'),
//                 'message' => 'A password is required'
//             )
//         ),
//         'role' => array(
//             'valid' => array(
//                 'rule' => array('inList', array('admin', 'author')),
//                 'message' => 'Please enter a valid role',
//                 'allowEmpty' => false
//             )
//         )
//     );
//     public function beforeSave($options = array()) {
//     if (isset($this->data[$this->alias]['password'])) {
//         $passwordHasher = new SimplePasswordHasher();
//         $this->data[$this->alias]['password'] = $passwordHasher->hash(
//             $this->data[$this->alias]['password']
//         );
//     }
//     return true;
//     }
//     public function isOwnedBy($post, $user) {
//         return $this->field('id', array('id' => $post, 'user_id' => $user)) === $post;
//     }
// }