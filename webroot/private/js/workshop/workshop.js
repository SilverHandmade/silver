function check(){
	var Pdate = document.getElementById( "postD" ).value;
	var Useisaku = document.getElementById( "useS" ).value;
	var Iseisaku = document.getElementById( "idS" ).value;
	var Nseisaku = document.getElementById( "nameS" ).value;
	var Igamen = document.getElementById( "imageG" ).value;
	var Msetumei = document.getElementById( "modelS" ).value;

	if (Msetumei > 5) {
		alert("内容が入力されていません。");
		return false;
	}
}
