<?php
	Router::connect('/', array('controller' => 'home', 'action' => 'index'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
	Router::connect('/register', array('controller' => 'users', 'action' => 'register'));
	Router::connect('/create-room', array('controller' => 'room', 'action' => 'create'));
	Router::connect('/room/:id', array('controller' => 'home', 'action' => 'chat'), array('id' => '[0-9]+'));
	Router::connect('/message/add', array('controller' => 'message', 'action' => 'add'));
	Router::connect('/message/edit', array('controller' => 'message', 'action' => 'edit'));
	Router::connect('/message/delete', array('controller' => 'message', 'action' => 'delete'));
	Router::connect('/message/getadd', array('controller' => 'message', 'action' => 'getadd'));
	Router::connect('/message/getupdate', array('controller' => 'message', 'action' => 'getupdate'));
	CakePlugin::routes();

	require CAKE . 'Config' . DS . 'routes.php';
