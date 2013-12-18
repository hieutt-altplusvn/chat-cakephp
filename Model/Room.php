<?php
class Room extends AppModel {

	public $primaryKey = 'room_id';

	public $validate = array(
		'name' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Room name is required.'
			),
			'unique' => array(
                'rule'    => array('checkRoom'),
                'message' => 'This room has already created.'
            )
		)
	);

	public function checkRoom() {

		$room = $this->find('first', array(
									'fields' => array(
										'Room.room_id',
										'Room.name'
									),
									'conditions' => array(
										'Room.name' => $data['name']
									)
								)
		);
		if (!empty($room)) {
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