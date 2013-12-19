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

    <div class="panel panel-default">
  		<div class="panel-heading"><h4>Show rooms</h4></div>
  		<table class="table">
          	<thead>
            	<tr>
              		<th>#</th>
              		<th>Room Name</th>
              		<th>Created by</th>
              		<th width="50">Action</th>
            	</tr>
            </thead>
        	<tbody>
        		<?php
        		foreach ($all as $r) {
        			$t = $r['Room'];
        		?>
        		<tr>
              		<td><?php echo $t['room_id']; ?></td>
              		<td><a href="room/<?php echo $t['room_id']; ?>"><?php echo $t['name']; ?></a></td>
              		<td><?php echo $t['created_by']; ?></td>
              		<td><button type="button" class="btn btn-info" onclick="window.location.href='room/<?php echo $t['room_id']; ?>'">Join now</button></td>
            	</tr>
            	<?php } ?>
          	</tbody>
        </table>
	</div>
</div>