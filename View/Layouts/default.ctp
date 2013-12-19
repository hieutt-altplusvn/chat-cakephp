<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('style');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-theme.min');
		echo $this->Html->script('jquery.min');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('chat');
		// echo $this->fetch('meta');
		// echo $this->fetch('css');
		// echo $this->fetch('script');
	?>
</head>
<body>	
<?php
$act = $this->params['action'];
?>
<div class="navbar navbar-default navbar-static-top">
    <a class="navbar-brand" href="/chat-cakephp">Chat System</a>
    <?php
    if (!isset($users)) { ?>
    <ul class="nav navbar-nav navbar-right">
        <li <?php if ($act == 'login') echo 'class="active"'; ?>><a href="login">Login</a></li>
        <li <?php if ($act == 'register') echo 'class="active"'; ?>><a href="register">Register</a></li>
    </ul>
    <?php } else { ?>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#" class="navbar-link"> Signed in as <?php echo $users['username']; ?></a></li>
        <li><a href="logout">Logout</a></li>
    </ul>
    <?php } ?>
</div>        
	<?php echo $this->fetch('content'); ?>

	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
