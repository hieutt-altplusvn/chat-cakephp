<?php
App::uses('AppController', 'Controller');

class MessageController extends AppController {

	public $uses = array('Room', 'Message');
	var $helpers = array('Form');

	public function beforeFilter() {

		parent::beforeFilter();
	}

	/*
	* @router('/message/add')
	*/
	public function add() {

		$this->autoRender = false;
		if ($this->request->is('post')) {
			$data['Message']['message'] = $this->data['msg'];
			$data['Message']['room_id'] = $this->data['room_id'];
			$users = $this->Session->read('Auth.User');		
			$data['Message']['user_id'] = $users['user_id'];
			$data['Message']['username'] = $users['username'];
			$time = time();
			$data['Message']['time'] = $time;
			$data['Message']['update_time'] = $time;
			$data['Message']['is_actived'] = 1;
            if ($this->Message->save($data)) {
                $data = array('status' => 'success');
                header("Content-Type: application/json");
       			echo json_encode($data);
            } else {
                $data = array('status' => 'failed');
                header("Content-Type: application/json");
       			echo json_encode($data);
            }
        }
    }

	/*
	* @router('/message/edit')
	*/
	public function edit() {

		$this->autoRender = false;
		if ($this->request->is('post')) {
			$data['Message']['message'] = $this->data['msg'];
			$data['Message']['message_id'] = $this->data['msg_id'];
			$time = time();
			$data['Message']['update_time'] = $time;
			$data['Message']['is_actived'] = 1;
            if ($this->Message->save($data)) {
                $data = array('status' => 'success');
                header("Content-Type: application/json");
       			echo json_encode($data);
            } else {
                $data = array('status' => 'failed');
                header("Content-Type: application/json");
       			echo json_encode($data);
            }
        }
    }

	/*
	* @router('/message/getadd')
	*/
	public function getadd() {

		$this->autoRender = false;
		if ($this->request->is('post')) {
			$users = $this->Session->read('Auth.User');
			$id = $this->data['id'];
			$room_id = $this->data['room_id'];
			$current_time = $this->data['current_time'];
			$records = $this->Message->getMessageAdd($id, $room_id);
			if (count($records) > 0) {
				$data['status'] = 'refresh';
				foreach ($records as $record) {
					$record = $record['Message'];
					//$record['update_time'] = date("d/m H:i", $record['update_time']);
					if ($users['user_id'] == $record['user_id'])
						$record['own'] = 1;
					else $record['own'] = 0;
					$data['data'][] = $record;
					$last_id = $record['message_id'];
				}
				$data['last_id'] = $last_id;
				if ($record['update_time'] > $current_time) $data['current_time'] = $record['update_time'];
                header("Content-Type: application/json");
       			echo json_encode($data);
			} else {
                $data = array('status' => 'no');
                header("Content-Type: application/json");
       			echo json_encode($data);
            }
        }
    }

    /*
    * @router('/message/getupdate')
    */
    public function getupdate() {

    	$this->autoRender = false;
		if ($this->request->is('post')) {
			$users = $this->Session->read('Auth.User');
			$room_id = $this->data['room_id'];
			$current_time = $this->data['current_time'];
			$records = $this->Message->getMessageUpdate($room_id, $current_time);
			if (count($records) > 0) {
				$data['status'] = 'success';
				foreach ($records as $record) {
					$record = $record['Message'];
					//$record['update_time'] = date("d/m H:i", $record['update_time']);
					if ($users['user_id'] == $record['user_id'])
						$record['own'] = 1;
					else $record['own'] = 0;
					$data['data'][] = $record;
					$msg_id = $record['message_id'];
					$msg = $record['message'];
					$time = time();
					if ($record['update_time'] > $current_time) $data['current_time'] = $record['update_time'];
					else $data['current_time'] = $current_time;
					// if ($record['is_actived'] == '2') {
					// 	$d = array();
					// 	$d['Message']['message_id'] = $msg_id;
					// 	$d['Message']['update_time'] = $time;
					// 	$d['Message']['is_actived'] = 1;
     //        			$this->Message->save($d);
					// }
				}
                header("Content-Type: application/json");
       			echo json_encode($data);
			} else {
                $data = array('status' => 'no');
                header("Content-Type: application/json");
       			echo json_encode($data);
            }
        }
    }

    /*
    * @router('/message/delete')
    */
    public function delete() {

		$this->autoRender = false;
		if ($this->request->is('post')) {
			$data['Message']['message_id'] = $this->data['msg_id'];
			$current_time = $this->data['current_time'];
			$time = time();
			$data['Message']['update_time'] = $time;
			$data['Message']['is_actived'] = 0;
            if ($this->Message->save($data)) {
            	if ($time > $current_time) $data['current_time'] = $time;
					else $data['current_time'] = $current_time;
                $data = array('status' => 'success');
                header("Content-Type: application/json");
       			echo json_encode($data);
            } else {
                $data = array('status' => 'failed');
                header("Content-Type: application/json");
       			echo json_encode($data);
            }
        }
    }
}