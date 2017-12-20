$(function() {
	$('form').change(function(event) {
		// HTMLでの送信をキャンセル
    	// event.preventDefault();

	    var $form = $(this);

		$.ajax({
			url: location.href,
			type: $form.attr('method'),
			dataType: "html",
			data: $form.serialize()
		}).done(function (response) {
			$("#result").html(response);
		}).fail(function () {
			alert("failed");
		});
	});
});
