$(".js_increment").click(function(){
	var url = $(this).attr("data-link");
	$id = $(this).data('id');
	$.ajax({
		url: url,
		type:"POST",
		beforeSend: function (xhr) {
			var token = $('meta[name="csrf-token"]').attr('content');

			if (token) {
				return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			}
		}
	}); //end of ajax
});