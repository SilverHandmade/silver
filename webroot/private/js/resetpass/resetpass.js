$(function() {

		$('#regform').submit(function() {
			var regP = $('#regP').val();
			var regRP = $('#regRP').val();

	        if (regP.length != 0 && regRP.length != 0) {

	            if (regP != regRP) {
	                alert("パスワードに入力された内容が間違っています");
	                return false;
	            }
	        }

		});

});

$(function(){
	$('#transmit').bind("click",function(){
		// パスワードを取得
		var regP = $('#regP').val();
		var regRP = $('#regRP').val();

		regP = regP.trim();
		regRP = regRP.trim();
		r_flg=0;

		// 文字数チェック
		if (regP.length <= 5 || regP.length >= 21) {
			alert("パスワードは6文字～20文字でなければなりません");
			// return false;
			r_flg=1;
		}

		var inte = 0;
		var lit = 0;
		var lag = 0;

		// 上から数字・小文字・大文字があるか
		if (regP.match(/[0-9]/) != null) {
			inte = 1;
		}
		if (regP.match(/[a-z]/) != null) {
			lit = 1;
		}
		if (regP.match(/[A-Z]/) != null) {
			lag = 1;
		}

		var mojisyu = inte + lit + lag;

		if (mojisyu = 1) {
			alert("文字の種類を２種以上含んだパスワードにしてください。");
			r_flg=1;
		}
		// if (Pas != "" && RPas != "" && Pas == RPas && regP.length >= 6 && regP.length <= 20 && mozisyu >= 2) {
        //
		// }else {
		// 	alert("入力が正しくありません。再度入力してください。");
		// 	return false;
		// }


		if (regP.length == 0 || regRP.length == 0) {
			alert("入力されていない項目があります。");
			r_flg=1;
		}

		if(r_flg=1){
			return false;
		}

	});
});
