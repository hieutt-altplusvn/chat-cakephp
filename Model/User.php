<?php
class User extends AppModel {

	public $validate = array(
		'username' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Username is required'
			),
			'unique' => array(
                'rule'    => array('checkUsername'),
                'message' => 'This username is already in use.'
            )
		),
		'password' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Password is required'
			)
		),
		'email' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Email is required'
			)
		)
	);

	public function checkUsername($data) {

		$username = $this->find('first', array(
									'fields' => array(
										'User.user_id',
										'User.username'
									),
									'conditions' => array(
										'User.username' => $data['username']
									)
								)
		);
		if (!empty($username)) {
			return false;
		} else return true;
	}

	public function beforeSave($options = array()) {

	 	parent::beforeSave($options);
        if(isset($this->data['User']['password'])){
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }        
    }
}