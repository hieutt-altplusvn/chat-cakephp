<?php
App::uses('AppController', 'Controller');

class HomeController extends AppController {

	public function beforeFilter() {

		parent::beforeFilter();
	}

	public function index() {

		$users = $this->Session->read('Auth.User');
		$this->set(compact('users'));
	}
	
}