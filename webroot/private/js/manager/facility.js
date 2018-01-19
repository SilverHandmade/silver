$(function(){
	$(document).on('submit', '[id^=FChange]',function(event) {
		// HTMLでの送信をキャンセル
		event.preventDefault();

		var $FacilityChange = $(this);
		var $loading = $(".icon");

		$.ajax({
			type: "post",
			dataType: "html",
			url: $FacilityChange.attr('action'),
			data: $FacilityChange.serialize(),
			beforeSend: function(xhr) {
				$loading.children('span').removeClass().addClass("loading")
			}
		})
		.done(function (response) {
			loadinig($loading, response);
		}).fail(function () {
			alert("failed");
		});
	});

	$(document).on("click", ".fdelete", function(){
		var $Del_flg = $(this).parents('form').children('[name=Del_flg]');
		if ($Del_flg.attr('value') == 1) {
			$Del_flg.attr('value', 0);
		} else {
			$Del_flg.attr('value', 1);
		}
		$(this).parents('form').submit();
	});
});

function loadinig($loading, response){
	$.when(
		$.when(
			$loading.fadeToggle('fast', function() {
				$loading.children('span').removeClass('loading');
			})
		).done(function(){
			if (response == 'true') {
				$loading.children('span').addClass("ok");
			} else {
				$loading.children('span').addClass("denied");
			}
		})
	).done(function(){
		$loading.fadeToggle('fast');
		setTimeout(function(){
			$.when(
				$loading.fadeToggle('fast')
			).done(function(){
				$loading.toggle('fast')
				$loading.children('span').removeClass()
			})
		},1000);
	});
}
$(function(){
	$(document).on('hide.bs.modal', '[id^=fModal]',function () {
		$('.searchAjax').submit();
	});
});
