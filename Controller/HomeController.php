<?php
App::uses('AppController', 'Controller');

class HomeController extends AppController {

	public $uses = array('Room', 'Message');

	public function beforeFilter() {

		parent::beforeFilter();
		$users = $this->Session->read('Auth.User');
		$this->set(compact('users'));
	}

	/*
	* @router('/')
	*/
	public function index() {

		$all = $this->Room->getAll();
		$this->set('all', $all);
	}
	
	/*
	* @router('/room/id')
	*/
	public function chat() {
		$this->set('title_for_layout','Chat room');
		$room_id = $this->request->params['id'];
		$last = $this->Room->getLastId();
		if ($room_id == '0')
			$room_id = $last['Room']['room_id'];
		$data = $this->Room->getNameById($room_id);
		$data['Message'] = $this->Message->getMessageByRoomId($room_id);		
		$this->set('data', $data);
	}
}