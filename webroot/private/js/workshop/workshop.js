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

		if (document.getElementById( "imageG" ).value == "") {
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
