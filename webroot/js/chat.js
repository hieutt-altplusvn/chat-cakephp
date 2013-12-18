$(document).ready(function() {
	$('.btn-create-room').click(function() {
		var name = $('#name').val();
		$.ajax({
			type: 'POST',
			url: 'create-room',
			data: 'name='+name,
			dataType: 'json',
			success: function(data) {
				alert(1);
				if (data.status == "success") {
					alert(2);
					window.location.href = "/room";
				}

			}
		})
	})
})