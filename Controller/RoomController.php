<?php
App::uses('AppController', 'Controller');

class RoomController extends AppController {

	public $uses = array('Room', 'Message');
	var $helpers = array('Form');

	public function beforeFilter() {

		parent::beforeFilter();
	}

	/*
	* @router('/create-room')
	*/
	public function create() {

		$this->autoRender = false;
		if ($this->request->is('post')) {
			$data = $this->data;
			$users = $this->Session->read('Auth.User');
			$data['Room']['user_id'] = $users['user_id'];
			$data['Room']['created_by'] = $users['username'];
			$data['Room']['name'] = $this->data['name'];
			$time = time();
			$data['Room']['time'] = $time;
			$data['Room']['update_time'] = $time;
            if ($this->Room->save($data)) {
                $this->Session->setFlash('Add new room succssfully!');
                $data = array('status' => 'success');
                header("Content-Type: application/json");
       			echo json_encode($data);
            } else {
                $this->Session->setFlash('Add new room failed!!!', 'flash/error');
            }
        }
    }
}