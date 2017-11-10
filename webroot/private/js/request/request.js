function aaa(){
	alert( "表示テスト" );
}
function nextpage(){


var rtitle = document.getElementById( "reqT" ).value;
var rnum = document.getElementById( "reqN" ).value;
var wsid = document.getElementById( "wsID" ).value;
var rdate = document.getElementById( "reqD" ).value;


alert(test);



if (rnum <= 0) {
	alert("個数に0以下の数値は指定できません。");
	return false;
}


}












//今日の日時を表示
		window.onload = function () {
				//今日の日時を表示
				var date = new Date()
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

				document.getElementById("reqD").value = ymd;
		}
