
function nextpage(){


var rtitle = document.getElementById( "reqT" ).value;
var rnum = document.getElementById( "reqN" ).value;
var wsid = document.getElementById( "wsID" ).value;
var rdate = document.getElementById( "reqD" ).value;

//現在の日付を取得
var now = new Date();
var deadline = new Date(rdate.split('-')[0], rdate.split('-')[1] - 1, rdate.split('-')[2]);

//残り日数計算に使用される変数
var dms = 1000 * 60 * 60 * 24;


//タイトル前後の空白をトリム
document.getElementById( "reqT" ).value = rtitle.replace(/^\s+|\s+$/g, "");
//タイトル文字数チェック
if (rtitle.length > 40) {
	alert("タイトルが40字を超えています。");
	return false;
}
//個数チェック
if (rnum <= 0) {
	alert("個数に0以下の数値は指定できません。");
	document.getElementById( "reqN" ).value = 1;
	return false;
}
//日付チェック
var d = deadline.getTime() - now.getTime();
d = Math.floor(d / dms);
if (d < 7) {
	alert("締め切りが七日を切っています。");
	return false;
}
}


//依頼先一覧絞り込み
$(function(){
	$('#searchbutton').bind("click",function(){
		var re = new RegExp($('#fsearch').val());
		$('.list-panel').each(function(){
			var Ntxt = $(this).find("#fname:eq(0)").html();
			var Atxt = $(this).find("#faddress:eq(0)").html();


			// Ntxt = Ntxt.replace("<a href=\"/silver/request/create\?","");
			// Ntxt = Ntxt.replace(/id=\d*/,"");
			// Ntxt = Ntxt.replace("\">","");
			// Ntxt = Ntxt.replace("</a>","");


			if(Atxt.match(re) != null || Ntxt.match(re) != null){
				$(this).show();
			}else{
				$(this).hide();
			}
		});
	});
});

//依頼一覧絞り込み
$(function(){
	$('#Reqsearchbutton').bind("click",function(){
		var re = new RegExp($('#rsearch').val());
		$('.panel').each(function(){
			var Ttxt = $(this).find("#rtitle:eq(0)").html();
			var FNtxt = $(this).find("#rfaci_name:eq(0)").html();

			Ttxt = Ttxt.replace("<p>","");
			Ttxt = Ttxt.replace("</p>","");
			FNtxt = FNtxt.replace("<p class=\"left\">","");
			FNtxt = FNtxt.replace("</p>","");
			if(Ttxt.match(re) != null || FNtxt.match(re) != null){
				$(this).show();
			}else{
				$(this).hide();
			}
		});
		$('#selectbox').val("0");
	});
});


//編集依頼一覧絞り込み
$(function(){
	$('#editReqbutton').bind("click",function(){
		var re = new RegExp($('#rsearch').val());

		$('.req_li').each(function(){
			var Ttxt = $(this).find("#rtitle:eq(0)").html();
			var FNtxt = $(this).find("#rfaci_name:eq(0)").html();
			Ttxt = Ttxt.replace("<button type=\"submit\" class=\"submit-button\">","");
			Ttxt = Ttxt.replace("</button>","");
			FNtxt = FNtxt.replace("<p>","");
			FNtxt = FNtxt.replace("</p>","");
			if(Ttxt.match(re) != null || FNtxt.match(re) != null){
				$(this).show();
			}else{
				$(this).hide();
			}
		});
	});
});





$(function(){
	$('#edit_con').bind("click",function(){

var rtitle = document.getElementById( "reqselT_con" ).value;
var rnum = document.getElementById( "reqselN_con" ).value;
var rdate = document.getElementById( "selreqD_con" ).value;

//現在の日付を取得
var now = new Date();
var deadline = new Date(rdate.split('-')[0], rdate.split('-')[1] - 1, rdate.split('-')[2]);

//残り日数計算に使用される変数
var dms = 1000 * 60 * 60 * 24;


//タイトル前後の空白をトリム
document.getElementById( "reqselT_con" ).value = rtitle.replace(/^\s+|\s+$/g, "");
//タイトル文字数チェック
if (rtitle.length > 40) {
	alert("タイトルが40字を超えています。");
	return false;
}

//個数チェック
if (rnum <= 0) {
	alert("個数に0以下の数値は指定できません。");
	document.getElementById( "reqselN_con" ).value = 1;
	return false;
}
if (rnum > 999) {
	alert("個数に4桁以上の数値は指定できません。");
	document.getElementById( "reqselN_con" ).value = 1;
	return false;
}

if (document.getElementById( "dateCheck" ).checked) {
	//日付チェック
	var d = deadline.getTime() - now.getTime();
	d = Math.floor(d / dms);
	if (d < 7) {
		alert("締め切りが本日から七日を切っています。");
		return false;
	}
}else{
	var myRet = confirm("締め切り日は変更されません。よろしいですか？");
	if ( myRet == true ){

	}else{
		return false;
	}
}



});
});


//依頼詳細画面の依頼完了ボタンが押されたとき
$(function(){
	$('#kanryo').bind("click",function(){
		var myRet = confirm("依頼を完了しますか？");
		if ( myRet == true ){

		}else{
			return false;
		}
});
});

//依頼詳細画面の依頼受注ボタンが押されたとき
$(function(){
	$('#order').bind("click",function(){
		var myRet = confirm("依頼を受注しますか？");
		if ( myRet == true ){
		}else{
			return false;
		}
});
});

//依頼編集画面の依頼取り消しボタンが押されたとき
$(function(){
	$('#cancel').bind("click",function(){
		var myRet = confirm("依頼を取り消しますか？");
		if ( myRet == true ){
		}else{
			return false;
		}
});
});

//依頼修正画面の修正確定ボタンが押されたとき
$(function(){
	$('#edit_ok').bind("click",function(){
		var myRet = confirm("この内容で更新しますか？");
		if ( myRet == true ){
		}else{
			return false;
		}
});
});

//依頼画面の確定ボタンが押されたとき
$(function(){
	$('#ok').bind("click",function(){
		var myRet = confirm("この内容でよろしいですか？");
		if ( myRet == true ){
		}else{
			return false;
		}
});
});

//メッセージの送信ボタンが押されたとき
$(function(){
	$('#messagebtn').bind("click",function(){
		var mestxt = document.getElementById( "messagetxt" ).value;
		mestxt = mestxt.trim();
		
		if (mestxt != "") {
			var myRet = confirm("確定後は編集できません。この内容でよろしいですか？\n" + mestxt);
			if ( myRet == true ){

			}else{
				return false;
			}
		}else{
			alert("本文が入力されていません。");
			document.getElementById( "messagetxt" ).value = "";
			return false;
		}

});
});


//list画面のステータスセレクトボックスの処理
function select_state(){
	var sel_st = new RegExp($('#selectbox').val());
	if (sel_st == "/0/") {
		$('.panel').each(function(){
			var req_st = $(this).find("#req_state:eq(0)").html();
			$(this).show();

		});
	}else if (sel_st == "/1/") {
		$('.panel').each(function(){
		var req_st = $(this).find("#req_state:eq(0)").html();
		req_st = req_st.replace("<p>","");
		req_st = req_st.replace("<p class=\"p-jutyu\">","");
		req_st = req_st.replace("</p>","");
		if(req_st.match("受注中") != null ){
			$(this).show();
		}else{
			$(this).hide();
		}
		});
	}else if (sel_st == "/2/") {
		$('.panel').each(function(){
		var req_st = $(this).find("#req_state:eq(0)").html();
		req_st = req_st.replace("<p>","");
		req_st = req_st.replace("<p class=\"p-jutyu\">","");
		req_st = req_st.replace("</p>","");
		if(req_st.match("受注可能") != null ){
			$(this).show();
		}else if (req_st.match("依頼中") != null ) {
			$(this).show();
		}else{
			$(this).hide();
		}
		});
	}



}



//今日の日時を表示
	/*	window.onload = function () {
				//今日の日時を表示
				/*var date = new Date()
				var year = date.getFullYear()
				var month = date.getMonth() + 1
				var day = date.getDate()

				var toTwoDigits = function (num, digit) {
					num += ''
					if (num.length < digit) {
						num = '0' + num
					}
					return num
				}

				var yyyy = toTwoDigits(year, 4)
				var mm = toTwoDigits(month, 2)
				var dd = toTwoDigits(day, 2)
				var ymd = yyyy + "-" + mm + "-" + dd;

				document.getElementById("reqD").value = ymd;*/
		// 		var a =0;
        //
		// }
