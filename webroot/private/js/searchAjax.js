$(function() {
	$('.searchAjax').submit(function(event) {
		// HTMLでの送信をキャンセル
    	event.preventDefault();

	    var $form = $(this);
		var $loading = $('.over_window');

		$.ajax({
			url: location.href,
			type: $form.attr('method'),
			dataType: "html",
			data: $form.serialize(),
			beforeSend: function(xhr) {
				$loading.removeClass('none')
			}
		}).done(function (response) {
			$("#searchAjaxResult").html(response);
			$loading.addClass('none');
		}).fail(function () {
			alert("failed");
		});
	});
});
