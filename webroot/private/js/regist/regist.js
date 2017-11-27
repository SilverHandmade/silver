$(function() {

	$('#regform').submit(function() {

	    var username = $('#username').val();
	    var hurigana = $('#hurigana').val();
	    var regM = $('#regM').val();
	    var regRM = $('#regRM').val();
	    var regP = $('#regP').val();
	    var regRP = $('#regRP').val();

	    if (username.length >= 7) {
	        alert("氏名は6文字以内です");
	        return false;
	    }


	    if (hurigana.length >= 31) {
	        alert("フリガナは30文字以内です");
	        return false;
	    } else {
	        if (hurigana.match(/^[ァ-ヶー　]*$/)) { //"ー"の後ろの文字は全角スペースです。
	        } else {
	            alert("全角カタカナではない文字が含まれています");
	            return false;
	        }
		}

	    if (regM.length >= 256) {
            alert("メールアドレスは255文字以内です");
            return false;
        } else if (regM.length != 0 && regRM.length != 0) {
            if (regM != regRM) {
                alert("メールアドレスに入力された内容が間違っています");
                return false;
            }
        }

        if (regP.length != 0 && regRP.length != 0) {

            if (regP != regRP) {
                alert("パスワードに入力された内容が間違っています");
                return false;
            }
        }

	});

});
