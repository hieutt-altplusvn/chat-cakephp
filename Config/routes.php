<?php
	Router::connect('/', array('controller' => 'home', 'action' => 'index'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
	Router::connect('/register', array('controller' => 'users', 'action' => 'register'));
	Router::connect('/create-room', array('controller' => 'room', 'action' => 'create'));
	CakePlugin::routes();

	require CAKE . 'Config' . DS . 'routes.php';
