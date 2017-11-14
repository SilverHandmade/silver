function test(){
	var username = document.getElementById("username").value;
	var hurigana = document.getElementById("hurigana").value;
	var regM = document.getElementById("regM").value;
	var regRM = document.getElementById("regRM").value;
	var regP = document.getElementById("regP").value;
	var regRP = document.getElementById("regRP").value;
	var str = "アイウエオワイウエオン";

	if (username.length >= 7) {
		alert("氏名は6文字以内です");
		return false;
	}

	if (hurigana.length >= 31) {
		alert("フリガナは30文字以内です");
		return false;

	}else if (str.match(/^[\u30A0-\u30FF]+$/)) {
	    alert("すべて全角カタカナである");
		return false;
	} else {
	    alert("全角カタカナでない文字がある");
		return false;
	}


}


	if (regM.length >= 256) {
		alert("メールアドレスは255文字以内です");
		return false;
	}else {
		if(regM != regRM){
		alert("メールアドレスに入力された内容が間違っています");
		return false;
		}
	}

	if (regP != regRP) {
		alert("パスワードに入力された内容が間違っています");
		return false;
	}
}
