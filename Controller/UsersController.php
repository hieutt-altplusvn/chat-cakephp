<?php
class UsersController extends AppController {
	var $name = 'Users';
	var $helpers = array('Form');

	public function beforeFilter() {

		parent::beforeFilter();
		$this->Auth->allow('login', 'register');
	}

	public function login() {
		//$this->autoRender = false;

		// if already logged in, redirect to chat room
		if ($this->Session->check('Auth.User')) {
			$this->redirect('/');
		}
		
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirectUrl());
			} else
				$this->Session->setFlash("Invalid username or password.", 'default', array(), 'login');
		}
	}

	public function logout() {

		$this->Auth->logout();
		$this->redirect('/login');
	}

	public function register() {

		// if already logged in, redirect to chat room
		if ($this->Session->check('Auth.User')) {
			$this->redirect('/');
		}
		
		if ($this->request->is('post')) {
			$this->User->create();
			$data = $this->request->data;
			if ($this->User->save($data)) {
				$this->Session->setFlash("User has been created.", 'default', array(), 'register');
				$this->redirect('/login');
			} else {
				$this->Session->setFlash("This user couldn't created. Please try again.");
			}
		} else
			$this->Session->delete('Message.register');
	}
}