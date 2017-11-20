$(function(){
	$('#add').click(function() {
		var plusHtml = '<div class="row none div-margin-top" id="plusHtml"><div class="col-md-1"><button class="btn btn-default" type="button" name="button" id="remove"><span class="glyphicon glyphicon-remove-sign"></span></button></div><div class="col-md-3"><div class="div-btn"><input type="file" class="input-file none file"><button type="button" name="" id="upload">画像選択</button></div><span id="fake_input_file">NOT FILE</span></div><div class="col-md-8"><input class="form-control" type="text"></div></div>';

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

	$('#back').click(function() {
		location.href = "http://localhost/silver/work-shop";
	});

	$('#upload').click(function() {
		$('.file').click();
		return false;
	});
	$(document).on("change", ".file", function(){
		var file_name = $(this).prop('files')[0].name;
		$(this).parent().next().html(file_name);
	});


});
