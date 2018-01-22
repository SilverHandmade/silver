$(function(){
	var $loading = $('.over_window');

	$(document).on('show.bs.modal', '[id^=uModal]',function(event) {
		var $fclass = $(this).find('form');
		getFacility($fclass);
	});
	$(document).on('click', 'input[name=fClassId]',function(event) {
		var $fclass = $(this).parents('form');
		getFacility($fclass);
	});

	function getFacility($fclass) {
		$.ajax({
			type: "post",
			dataType: "html",
			url: location.href,
			data: $fclass.serialize(),
			beforeSend: function(xhr) {
				$loading.removeClass('none');
			}
		})
		.done(function (response) {
			$fclass.find('#fClassResult').html(response);
			$loading.addClass('none');
		}).fail(function () {
			$loading.addClass('none');
			alert("failed");
		});
	}

});
$(function(){
	$(document).on('submit', '[id^=UChange]',function(event) {
		// HTMLでの送信をキャンセル
		event.preventDefault();
		var $UserChange = $(this);
		var $icon = $(".icon");

		$UserChange.find('#updateFlg').attr('value', 1);
		$.ajax({
			type: "post",
			dataType: "html",
			url: $UserChange.attr('action'),
			data: $UserChange.serialize(),
			beforeSend: function(xhr) {
				$icon.children('span').addClass('loading');
			}
		})
		.done(function (response) {
			loadinig($icon, response);
		}).fail(function () {
			alert("failed");
		});
	});

});


function loadinig($icon, response){
	$.when(
		$.when(
			$icon.fadeToggle('fast', function() {
				$icon.children('span').removeClass('loading');
			})
		).done(function(){
			if (response == 'True') {
				$icon.children('span').addClass("ok");
			} else {
				$icon.children('span').addClass("denied");
			}
		})
	).done(function(){
		$icon.fadeToggle('fast');
		setTimeout(function(){
			$.when(
				$icon.fadeToggle('fast')
			).done(function(){
				$icon.toggle('fast')
				$icon.children('span').removeClass()
			})
		},1000);
	});
}
$(function(){
	$(document).on('hide.bs.modal', '[id^=uModal]',function () {
		$('.searchAjax').submit();
	});
});

$(function(){
	$(document).on("click", ".udelete", function(){
		var $Del_flg = $(this).parents('form').children('[name=Del_flg]');
		if ($Del_flg.attr('value') == 1) {
			$Del_flg.attr('value', 0);
		} else {
			$Del_flg.attr('value', 1);
		}
		$(this).parents('form').submit();
	});

});
