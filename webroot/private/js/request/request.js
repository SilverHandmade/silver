
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
		$('#facitable tbody tr').each(function(){
			var Ntxt = $(this).find("#fname:eq(0)").html();
			var Atxt = $(this).find("#faddress:eq(0)").html();

			Ntxt = Ntxt.replace("<button type=\"submit\" class=\"typesubmit\">","");
			Ntxt = Ntxt.replace("</button>","");
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
		$('#reqseltable tbody tr').each(function(){
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

if (document.getElementById( "dateCheck" ).checked) {
	//日付チェック
	var d = deadline.getTime() - now.getTime();
	d = Math.floor(d / dms);
	if (d < 7) {
		alert("締め切りが七日を切っています。");
		return false;
	}
}


});
});

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
