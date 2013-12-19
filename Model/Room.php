<?php
App::uses('AppModel', 'Model');
class Room extends AppModel {

	public $name = 'Room';
	public $primaryKey = 'room_id';

	public $validate = array(
		'name' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Room name is required.'
			)
		)
	);

    public function getAll() {

    	$data = $this->find('all', array('order' => 'Room.room_id DESC'));
    	return $data;
    }

    public function getNameById($id) {

    	$data = $this->find('first', array('conditions' => array('Room.room_id' => $id)));
 		return $data;
    }

    public function getLastId() {

    	$data = $this->find('first', array('order' => 'Room.room_id DESC'));
 		return $data;
    }

	public function beforeSave($options = array()) {

	 	parent::beforeSave($options);
    }
}