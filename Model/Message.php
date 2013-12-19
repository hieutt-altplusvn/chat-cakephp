<?php
App::uses('AppModel', 'Model');
class Message extends AppModel {

	public $name = 'Message';
	public $primaryKey = 'message_id';

	public $validate = array(
		'message' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Message required not null.'
			)
		)
	);

    public function getMessageByRoomId($id) {

    	$data = $this->find('all', array('conditions' => array('Message.room_id' => $id)));
 		return $data;
    }

    public function getMessageAdd($id = 0, $room_id) {

    	$data = $this->find('all', array('conditions' => array('Message.is_actived' => '1', 'Message.message_id >' => $id, 'Message.room_id' => $room_id)));
 		return $data;
    }

    public function getMessageUpdate($room_id, $current_time) {

    	$data = $this->find('all', array('conditions' => array('Message.update_time >' => $current_time, 'Message.room_id' => $room_id)));
 		return $data;
    }

	public function beforeSave($options = array()) {

	 	parent::beforeSave($options);
    }
}