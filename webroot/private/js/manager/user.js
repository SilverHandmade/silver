$(function(){
	$(document).on("click", ".fdelete", function(){
		var $Del_flg = $(this).parents('form').children('[name=Del_flg]');
		if ($Del_flg.attr('value') == 1) {
			$Del_flg.attr('value', 0);
		} else {
			$Del_flg.attr('value', 1);
		}
		$(this).parents('form').submit();
	});
	$(document).on("submit", "#UChange", function(event){
		$("#updateFlg").attr('value', 1);
	});

});
