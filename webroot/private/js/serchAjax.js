$(function() {
	$('form').change(function(event) {
		// 操作対象のフォーム要素を取得
	    var $form = $(this);

	    // 送信
		$.ajax({
			url: location.href,
			type: $form.attr('method'),
			dataType: "html",
			data: $form.serialize(),
		}).done(function (response) {
			$("#result").html(response);
		}).fail(function () {
			alert("failed");
		});
	});
});
