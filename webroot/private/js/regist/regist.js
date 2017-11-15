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
	}else {
		isZenKatakana(hurigana);
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
function isZenKatakana(str){
  str = (str==null)?"":str;
  if(str.match(/^[ァ-ヶー　]*$/)){    //"ー"の後ろの文字は全角スペースです。
    return true;
  }else{
	  alert("全角カタカナではない文字が含まれています");
    return false;
  }
}
