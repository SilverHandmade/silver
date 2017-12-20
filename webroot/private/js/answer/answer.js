$(function(){
	$('#completebtn').bind("click",function(){
		var yesno = confirm("この内容で投稿してもよろしいですか？");
		if (yesno == true) {

		}else{
			return false;
		}

	});

});
$(function(){
	$('#answerbtn').bind("click",function(){
		var answertxt = $('#answertxt').val();
		if (answertxt == "") {
			alert("本文を入力してください");
			return false;
		}

	});

});
