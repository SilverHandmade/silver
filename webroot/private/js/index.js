$(function(){
	$('#list').click(function (){
		$('#list').slideUp();
		$('#menu').slideDown();
	});
	$('#cross').click(function (){
		$('#list').slideDown();
		$('#menu').slideUp();
	});
});
