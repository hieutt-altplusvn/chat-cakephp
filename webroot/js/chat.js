$(document).ready(function() {
	$('.btn-create-room').click(function() {
		var name = $('#name').val();
		$.ajax({
			type: 'POST',
			url: 'create-room',
			data: 'name='+name,
			dataType: 'json',
			success: function(data) {
				if (data.status == "success") {
					window.location.href = "/room";
				}

			}
		})
	})
})