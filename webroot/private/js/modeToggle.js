$(function(){
	$(document).ready(function(){
		// 表示モードの設定
		var mode = GetCookie('ViewMode');
		if (mode === null) {
			document.cookie = 'ViewMode=list';
			$(".glyphicon-th-list").addClass("none");
			$("#modePanel").addClass("none");
		} else {
			if (mode === 'list') {
				$(".glyphicon-th-list").addClass("none");
				$("#modePanel").addClass("none");
			} else {
				$(".glyphicon-th-large").addClass("none");
				$("#modeList").addClass("none");
			}
		}
	});

	$('#ModeTogle').click(function (){
		Modetoggle();
	});

	function Modetoggle() {
		$('#modePanel').fadeToggle();
		$('.glyphicon-th-list').toggle();
		$('#modeList').fadeToggle();
		$('.glyphicon-th-large').toggle();
		if (document.cookie == 'ViewMode=list') {
			document.cookie = 'ViewMode=panel';
		} else {
			document.cookie = 'ViewMode=list';
		}
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
	$('#result').on('DOMSubtreeModified propertychange', function() {
		var mode = GetCookie('ViewMode');
		if (mode === null) {
			document.cookie = 'ViewMode=list';
			$(".glyphicon-th-list").addClass("none");
			$("#modePanel").addClass("none");
		} else {
			if (mode === 'list') {
				$(".glyphicon-th-list").addClass("none");
				$("#modePanel").addClass("none");
			} else {
				$(".glyphicon-th-large").addClass("none");
				$("#modeList").addClass("none");
			}
		}
    });
});
