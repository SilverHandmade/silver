$(function(){
	$(document).ready(function(){
		// 表示モードの設定
		var mode = GetCookie('videoViewMode');
		if (mode === null) {
			document.cookie = 'videoViewMode=list';
			$("#listMode").addClass("none");
			$("#videoPanel").addClass("none");
		} else {
			if (mode === 'list') {
				$("#listMode").addClass("none");
				$("#videoPanel").addClass("none");
			} else {
				$("#panelMode").addClass("none");
				$("#videoList").addClass("none");
			}
		}
	});

	$('#listMode').click(function (){
		Modetoggle();
		document.cookie = 'videoViewMode=list';
	});

	$('#panelMode').click(function (){
		Modetoggle();
		document.cookie = 'videoViewMode=panel';
	});

	function Modetoggle() {
		$('#videoPanel').fadeToggle();
		$('#listMode').toggle();
		$('#videoList').fadeToggle();
		$('#panelMode').toggle();
	}

	function GetCookie(name) {
		// クッキーの読み込み
		var result = null;
		var cookieName = name + '=';
		var allcookies = document.cookie;
		var position = allcookies.indexOf(cookieName);
		if(position != -1 ) {
			var startIndex = position + cookieName.length;

			var endIndex = allcookies.indexOf(';', startIndex);
			if(endIndex == -1) {
				endIndex = allcookies.length;
			}
			result = decodeURIComponent(allcookies.substring(startIndex, endIndex));
		}
		return result;
	}
});
