$(function(){
	var name = 1;
	var imagename = 1;
	$('#add').click(function() {
		var plusHtml = '<div class="row none div-margin-top" id="plusHtml"><div class="col-md-3"><button class="btn btn-default" type="button" name="button" id="remove"><span class="glyphicon glyphicon-remove-sign"></span></button><div class="div-btn"><input type="file" class="input-file none file"><button type="button" name="Upload'+ imagename++ +'"id="upload">画像選択</button></div><span id="fake_input_file">NOT FILE</span></div><div class="col-md-9"><input class="form-control" type="text" name="text'+ name++ +'"></div></div>';

		$(plusHtml).appendTo('#plus');
		$('.none').slideDown();
	});
	$(document).on("click", "#remove", function(){
		$.when(
			$(this).parent().parent().slideUp()
		).done(function(){
			$(this).remove();
		});
	});

	$('#back').click(function() {
		location.href = "http://localhost/silver/work-shop";
	});

	$('#syousaibtn1').click(function() {
		location.href = "http://localhost/silver/work-shop/detailses";
	});

	$('#upload').click(function() {
		$('.file').click();
		return false;
	});

	$(document).on("change", ".file", function(){
		var file_name = $(this).prop('files')[0].name;
		$(this).parent().next().html(file_name);
	});

	//WorkShop作成画面　送信ボタン
	$(function(){
		$('#Trans').click(function (){
			var Nseisaku = document.getElementById( "title" ).value;
			var Igamen = document.getElementById( "file_upload" ).value;
			var Msetumei = document.getElementById( "Stext" ).value;

			//制作物名エラーメッセージ
			if (Nseisaku == "") {
				alert("制作物名の入力がされていません");
				return false;
			}else if (Nseisaku.length > 25) {
				alert("制作物名は25文字以内で入力してください");
				return false;
			}

			if (document.getElementById( "file_upload" ).value == "") {
				alert("画像ファイルが設定されていません")
			}
			//説明欄エラーメッセージ
			if(Msetumei == ""){
				alert("説明欄の入力がされていません");
				return false;
			}

			//登録チェック
			if (window.confirm("以下の内容で登録します。よろしいですか？")) {
				alert("登録しました");
				return true;
			}else {
				alert("キャンセルされました")
				return false;
			}
		});
	});
});
