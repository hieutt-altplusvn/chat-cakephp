<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $components = array(
		'Session',
		'Auth' => array(
			'loginRedirect' => array('controller' => 'home', 'action' => 'index'),
			'logoutRedirect' => array('controler' => 'users', 'action' => 'login'),
			'authError' => 'Permission denined.',
			'authorize' => array('Controller')
		)
	);

	public function beforeFilter() {

		parent::beforeFilter();
		//$this->Auth->allow('login');
		$this->set('auth', $this->Auth);
	}

	public function isAuthorized($user) {    
    	return true;
	}
}
