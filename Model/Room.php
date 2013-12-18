<?php
class Room extends AppModel {

	public $primaryKey = 'room_id';

	public $validate = array(
		'name' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Room name is required.'
			)
		)
	);

	 public function beforeSave($options = array()) {

	 	parent::beforeSave($options);
        if(isset($this->data['User']['password'])){
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }        
    }
}