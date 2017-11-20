$(function(){
	$('#add').click(function() {
		var plusHtml = '<div class="row none div-margin-top" id="plusHtml"><div class="col-md-1"><button class="btn btn-default" type="button" name="button" id="remove"><span class="glyphicon glyphicon-remove-sign"></span></button></div><div class="col-md-3"><input type="file" name=""></div><div class="col-md-8"><input class="form-control" type="text"></div></div>';
		$(plusHtml).appendTo('#plus');
		$('.none').slideDown();
	});
	$(document).on("click", "#remove", function(){
		$.when(
			$(this).parent().parent().slideUp()
		).done(function(){
			$(this).remove();
		});
	});
});

$(function(){
	$('#back').click(function() {
		location.href = "http://localhost/silver/work-shop";
	});
});
