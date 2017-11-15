$(function(){
	$('#listMode').click(function (){
		Modetoggle();
	});
	$('#panelMode').click(function (){
		Modetoggle();
	});
	function Modetoggle() {
		$('#videoPanel').fadeToggle();
		$('#listMode').toggle();
		$('#videoList').fadeToggle();
		$('#panelMode').toggle();
	}
});
