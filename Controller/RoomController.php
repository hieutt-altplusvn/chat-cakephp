<?php
App::uses('AppController', 'Controller');

class RoomController extends AppController {

	public $uses = array('Room', 'Message');
	var $helpers = array('Form');

	public function beforeFilter() {

		parent::beforeFilter();
	}

	public function create() {

		$this->autoRender = false;
		if ($this->request->is('post')) {
            if ($this->Room->save($this->data)) {
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