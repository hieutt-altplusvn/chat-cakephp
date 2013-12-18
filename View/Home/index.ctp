<div class="container">
	<div class="jumbotron">
        <h1>Join chat room for fun ^_^</h1>
        <p class="lead">Here in the JS room, we have a nice little script on the bot that display's a welcome message to new user's of the room.</p>
        <?php
		echo $this->Form->create('Room', array('onsubmit' => 'return false;'));
        echo $this->Form->input('name', array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'Your room name', 'label' => false));
        echo $this->Form->submit(__('Create room',true), array('class'=>'btn-create-room btn btn-lg btn-success'));  
        echo $this->Form->end();?>
      </div>
</div>