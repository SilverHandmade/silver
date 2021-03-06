$(function(){
	$(document).ready(function(){
		// 表示モードの設定
		var mode = GetCookie('videoViewMode');
		if (mode === null) {
			document.cookie = 'videoViewMode=list';
			$(".glyphicon-th-list").addClass("none");
			$("#videoPanel").addClass("none");
		} else {
			if (mode === 'list') {
				$(".glyphicon-th-list").addClass("none");
				$("#videoPanel").addClass("none");
			} else {
				$(".glyphicon-th-large").addClass("none");
				$("#videoList").addClass("none");
			}
		}
	});

	$('#ModeTogle').click(function (){
		Modetoggle();
	});

	function Modetoggle() {
		$('#videoPanel').fadeToggle();
		$('.glyphicon-th-list').toggle();
		$('#videoList').fadeToggle();
		$('.glyphicon-th-large').toggle();
		if (document.cookie == 'videoViewMode=list') {
			document.cookie = 'videoViewMode=panel';
		} else {
			document.cookie = 'videoViewMode=list';
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
		var mode = GetCookie('videoViewMode');
		if (mode === null) {
			document.cookie = 'videoViewMode=list';
			$(".glyphicon-th-list").addClass("none");
			$("#videoPanel").addClass("none");
		} else {
			if (mode === 'list') {
				$(".glyphicon-th-list").addClass("none");
				$("#videoPanel").addClass("none");
			} else {
				$(".glyphicon-th-large").addClass("none");
				$("#videoList").addClass("none");
			}
		}
    });
});
