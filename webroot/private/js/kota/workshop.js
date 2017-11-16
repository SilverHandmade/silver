$(function(){
	$('#add').click(function() {
		var plusHtml = '<div class="row none" id="plusHtml"><div class="col-md-1"><button class="btn btn-default" type="button" name="button" id="remove"><span class="glyphicon glyphicon-remove-sign"></span></button></div><div class="col-md-3"><input type="file" name=""></div><div class="col-md-8"><input class="form-control" type="text"></div></div>';
		$.when(
			$(plusHtml).appendTo('#plus')
		).done(function(){
			// $('.none').slideDown();
		});
	});
	$(document).on("click", "#remove", function(){
		$.when(
			$(this).parent().parent().slideUp()
		).done(function(){
			$(this).remove();
		});
	});
});
