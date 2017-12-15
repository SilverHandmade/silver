$(function(){
	$('#list').click(function (){
		$('#list').slideUp();
		$('#menu').slideDown();
	});
	$('#cross').click(function (){
		$('#list').slideDown();
		$('#menu').slideUp();
	});
	// $('img').error(function(){
	//     setTimeout(function() {
	// 		alert(error);
	//         $(this).attr('src', '/silver/img/no_image.png');
	//     }, 0);
	// });
});
