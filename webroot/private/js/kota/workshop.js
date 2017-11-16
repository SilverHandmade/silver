$(function(){
	$().ready(function(){
		var addhtml = document.getElementById("plus").innerHTML;
	});
	$('#add').click(function() {
		$('#plus').clone(true).insertBefore($('#submit'));
	});
});
