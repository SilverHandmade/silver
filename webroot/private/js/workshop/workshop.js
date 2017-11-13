$(function(){
	$('#Trans').click(function (){
		alert("test");
	});
});

function check(){
	var Pdate = document.getElementById( "postD" ).value;
	var Useisaku = document.getElementById( "useS" ).value;
	var Iseisaku = document.getElementById( "idS" ).value;
	var Nseisaku = document.getElementById( "nameS" ).value;
	var Igamen = document.getElementById( "imageG" ).value;
	var Msetumei = document.getElementById( "modelS" ).value;

	if (Msetumei == "") {
		alert("oioioi");
		return false;
	}
}
