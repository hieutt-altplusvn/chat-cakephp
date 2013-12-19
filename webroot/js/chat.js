$(document).ready(function() {
	
	$(window).load(function() {
		document.getElementById('conversation').scrollTop = document.getElementById('conversation').scrollHeight;
	});

	$('.btn-create-room').click(function() {
		var name = $('#name').val();
		$.ajax({
			type: 'POST',
			url: 'create-room',
			data: 'name='+name,
			dataType: 'json',
			success: function(data) {
				if (data.status == "success") {
					window.location.href = "room/0";
				}

			}
		})
	});

	setInterval(
		function(){
			chatAdd();
			chatUpdate();
		}, 1000);
	
	function chatAdd() {
		var current_msg_id = $('#current_msg_id').val();
		var current_time = $('#current_time').val();
		var room_id = $('#room_id').val();
		$.ajax({
			type: 'POST',
			url: '../message/getadd',
			data: 'id='+current_msg_id+'&room_id='+room_id+'&current_time='+current_time,
			dataType: 'json',
			success: function(data) {
				if (data.status == "refresh") {
					for (var i=0; i<data.data.length; i++) {
						var action = "";
						if (data.data[i].own == 1) action = '<span class="edit edit-'+data.data[i].message_id+'" id="'+data.data[i].message_id+'">edit</span><span class="delete delete-'+data.data[i].message_id+'" id="'+data.data[i].message_id+'">delete</span>';
						$('#conversation').append('<div class="msg-record msg-record-'+data.data[i].message_id+'" id="'+data.data[i].message_id+'"><span class="user user-'+data.data[i].message_id+'" id="'+data.data[i].message_id+'">'+data.data[i].username+'</span>: <span class="mes mes-'+data.data[i].message_id+'" id="'+data.data[i].message_id+'">'+data.data[i].message+'</span><span class="time time-'+data.data[i].message_id+'">'+data.data[i].update_time+'</span>'+action+'</div>');
						document.getElementById('conversation').scrollTop = document.getElementById('conversation').scrollHeight;
					}
					$('#current_msg_id').val(data.last_id);
					$('#current_time').val(data.current_time);
				}

			}
		});
	}
	function chatUpdate() {
		var room_id = $('#room_id').val();
		var current_time = $('#current_time').val();
		$.ajax({
			type: 'POST',
			url: '../message/getupdate',
			data: 'room_id='+room_id+'&current_time='+current_time,
			dataType: 'json',
			success: function(data) {
				if (data.status == "success") {
					for (var i=0; i<data.data.length; i++) {
						var res = data.data;
						if (res[i].is_actived != 0) {
							$('.mes-'+res[i].message_id).html(res[i].message);
							$('.time-'+res[i].message_id).html(res[i].update_time);
						} else {
							$('.msg-record-'+res[i].message_id).hide();
						}
					}
					$('#current_time').val(data.current_time);
				}
			}
		});
	}

	$(document).on('click', '.delete', function() {
		var msg_id = $(this).attr("id");
		var current_time = $('#current_time').val();
		$.ajax({
			type: 'POST',
			url: '../message/delete',
			data: 'msg_id='+msg_id+'&current_time='+current_time,
			dataType: 'json',
			success: function(data) {
				//alert(data.status);
				$('#current_time').val(data.current_time);
				$('.msg-record-'+msg_id).fadeOut(500);
			}
		});
	});

	$(document).on('click', '.edit', function() {
		var msg_id = $(this).attr("id");
		var mes = $(".mes-"+msg_id).text();
		$('.mes-'+msg_id).html('<input value="'+mes+'" type="text" class="update-msg-'+msg_id+'"><input id="'+msg_id+'" type="submit" value="Save" class="btn-update-'+msg_id+'">');
		update(msg_id);
	});

	function update(id) {
		$('.btn-update-'+id).click(function() {
			var msg_id = $(this).attr("id");
			var msg = $('.update-msg-'+msg_id).val();
			$.ajax({
				type: 'POST',
				url: '../message/edit',
				data: 'msg_id='+id+'&msg='+msg,
				dataType: 'json',
				success: function(data) {
					if (data.status == "success") {
						$('.mes-'+msg_id).html(msg);
					}
				}
			});
		});
	}

	$('#frm-msg').submit(function() {
		
		var msg = $('#frm-msg').serialize();
		if ($('#msg').val() == '') {
			$('#msg').focus();
			return false;	
		}
		$.ajax({
			type: 'POST',
			url: '../message/add',
			data: msg,
			dataType: 'json',
			success: function(data) {
				$('#msg').val('');
				$('#msg').focus();
				document.getElementById('conversation').scrollTop = document.getElementById('conversation').scrollHeight;
			}
		});
		return false;
	})
})