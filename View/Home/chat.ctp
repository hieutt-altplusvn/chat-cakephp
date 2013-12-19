<div class="container">
	<div class="jumbotron">
        <h1>Room: <?php echo $data['Room']['name']; ?></h1>
        <address>
		 	<strong>Created by: <?php echo $data['Room']['created_by']; ?></strong><br>
		  	Time: <?php echo date('d/m/y',$data['Room']['time']); ?><br>
		</address>

	    <div id="conversation">
	    	<?php
	    	$current_msg_id = 0;
	    	$current_time = '0';
	    	foreach ($data['Message'] as $record) {
	    		$record = $record['Message'];
	    		$current_msg_id = $record['message_id'];	    		
	    		if ($current_time < $record['update_time']) $current_time = $record['update_time'];
					if ($record['is_actived'] != '0') {
					?>
					<div class="msg-record msg-record-<?php echo $record['message_id']; ?>" id="<?php echo $record['message_id']; ?>">
						<span class="user user-<?php echo $record['message_id']; ?>" id="<?php echo $record['message_id']; ?>"><?php echo $record['username']; ?></span>: 
						<span class="mes mes-<?php echo $record['message_id']; ?>" id="<?php echo $record['message_id']; ?>"><?php echo $record['message']; ?></span>
						<span class="time time-<?php echo $record['message_id']; ?>" id="<?php echo $record['message_id']; ?>"><?php echo date("d/m H:i", $record['update_time']); ?></span>
						
						<span class="edit edit-<?php echo $record['message_id']; ?>" id="<?php echo $record['message_id']; ?>"><?php if ($users['username'] == $record['username']) echo 'edit'; ?></span>
						<span class="delete delete-<?php echo $record['message_id']; ?>" id="<?php echo $record['message_id']; ?>"><?php if ($users['username'] == $record['username']) echo 'delete'; ?></span>

					</div>
					<?php
					}
				}
				
				?>
	    </div>
	    <input type="hidden" id="current_msg_id" value="<?php echo $current_msg_id; ?>">
	    <input type="hidden" id="current_time" value="<?php echo $current_time; ?>">
	    <form id="frm-msg" name="frm-msg" onsubmit="return false;">
	    <div class="col-lg-12">
    		<div class="input-group">
    			<input name="room_id" id="room_id" type="hidden" value="<?php echo $data['Room']['room_id']; ?>">
      			<input type="text" class="form-control" name="msg" id="msg" placeholder="enter your message">      			
      			<span class="input-group-btn">      				
        			<input class="btn btn-default" type="submit" value="Send!" id="btn-send">
      			</span>
    		</div>
    	</div>
    	</form>
    </div>
</div>