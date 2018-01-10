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

$(function(){
	$('input[name=fClassId]').click(function(){
		// alert("a");
		var $radio = $(this);
		$.ajax({
			url: location.href,
			type: "post",
			dataType: "html",
			data: $radio.serialize(),
		}).done(function (response) {
			$("#result").html(response);
		}).fail(function () {
			alert("failed");
		});
	});
});
$(function(){
	$('input[name=email]').blur(function(){
		var $email = $(this);
		var $loading = $(".icon");
		$.ajax({
			url: location.href,
			type: "post",
			dataType: "html",
			data: $email.serialize(),
			beforeSend: function(xhr) {
				$loading.children('span').removeClass().addClass("loading")
			}
		})
		.done(function (response) {
			$.when(
				$.when(
					$loading.fadeToggle('fast', function() {
						$loading.children('span').removeClass('loading');
					})
				).done(function(){
					if (mailAddressCheck(response, $email.val())) {
						$loading.children('span').addClass("ok");
					} else {
						$loading.children('span').addClass("denied");
					}
				})
			).done(function(){
				$loading.fadeToggle('fast');
			});

		}).fail(function () {
			alert("failed");
		});
	});
	function mailAddressCheck(count, address) {
		if (count != 0) {
			return false;
		}
		if(!address.match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)){
			return false;
		}
		return true;
	}
});

$(function(){
	$('#transmit').bind("click",function(){
		var username = $('#username').val();
		var hurigana = $('#hurigana').val();
		// メールアドレス
		var regM = $('#regM').val();
		var regRM = $('#regRM').val();
		// パスワードを取得
		var regP = $('#regP').val();
		var regRP = $('#regRP').val();

		username = username.trim();
		hurigana = hurigana.trim();
		regM = regM.trim();
		regRM = regRM.trim();
		regP = regP.trim();
		regRP = regRP.trim();

		// 文字数チェック
		if (regP.length <= 5 || regP.length >= 21) {
			alert("パスワードは6文字～20文字でなければなりません");
			return false;
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

		// if (Pas != "" && RPas != "" && Pas == RPas && regP.length >= 6 && regP.length <= 20 && mozisyu >= 2) {
        //
		// }else {
		// 	alert("入力が正しくありません。再度入力してください。");
		// 	return false;
		// }


		if (username.length == 0 || hurigana.length == 0 || regM.length == 0 || regRM.length == 0 || regP.length == 0 || regRP.length == 0) {
			alert("入力されていない項目があります。");
			return false;
		}

	});
});
