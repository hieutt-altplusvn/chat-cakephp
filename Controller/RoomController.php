<?php
App::uses('AppController', 'Controller');

class RoomController extends AppController {

	public $uses = array('Room', 'Message');
	var $helpers = array('Form');

	public function beforeFilter() {

		parent::beforeFilter();
	}

	public function create() {

		 if ($this->request->is('post')) {
            if ($this->Room->save($this->data)) {
                $this->Session->setFlash('Add new room succssfully!');
                header("Content-type: application/json");
                $data = array('status' => 'success');
       			echo json_encode($data);
       			exit;
            } else {
                $this->Session->setFlash('Add new room failed!!!', 'flash/error');
            }
        }
    }
	
}