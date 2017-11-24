$(function(){
	var video = $('#video').get(0);
	var videos = $('#videos').get(0);

	$(window).on('load',function(){
		// 現在の時間設定
		$('#nowTime').html(formatTime(video.currentTime));
		// 動画の再生時間表示
		$('#allTime').html(formatTime(video.duration));

		$("#seekbar").slider({
			max: video.duration,
			step: 1,
			range: "min",
			option: 'animate',
			slide: setTime
		});
		$("#volbar").slider({
			max: 1,
			step: 0.05,
			range: "min",
			value:1,
			option: 'animate',
			slide: setVol
		});
	});

	$('#playStop').click(function (){
		startTogle()
	});
	$('#video').click(function (){
		startTogle()
	});
	$('#mute').click(function() {
		volTogle();
	});

	video.addEventListener("timeupdate", function(){
		$('#seekbar').slider('value', Math.floor(video.currentTime));
		$('#nowTime').html(formatTime(video.currentTime));
	}, false);

	$('#fullScreen').click(function() {
		if (document.exitFullscreen) {
			document.exitFullscreen();
		} else if (document.mozCancelFullScreen) {
			document.mozCancelFullScreen();
		} else if (document.webkitCancelFullScreen) {
			document.webkitCancelFullScreen();
		}
		if (videos.requestFullscreen) {
			videos.requestFullscreen();
		} else if (videos.mozRequestFullScreen) {
			videos.mozRequestFullScreen();
		} else if (videos.webkitRequestFullscreen) {
			videos.webkitRequestFullscreen();
		}
	});
	document.addEventListener("webkitfullscreenchange", handleFSevent, false);
	document.addEventListener("mozfullscreenchange", handleFSevent, false);
	document.addEventListener("MSFullscreenChange", handleFSevent, false);
	document.addEventListener("fullscreenchange", handleFSevent, false);
	function handleFSevent() {
		if( (document.webkitFullscreenElement && document.webkitFullscreenElement !== null)
		 || (document.mozFullScreenElement && document.mozFullScreenElement !== null)
		 || (document.msFullscreenElement && document.msFullscreenElement !== null)
		 || (document.fullS1creenElement && document.fullScreenElement !== null) ) {
			screenTogle();
		}else{
			screenTogle();
		}
	}

	$('#controls').hover(function() {
		$(this).fadeTo('slow/400/fast', 1);
	}, function() {
		$(this).fadeTo('slow/400/fast', 0);
	});

	function startTogle() {
		$('.glyphicon-play').toggle();
		$('.glyphicon-pause').toggle();
		if (video.paused) {
			video.play();
		} else {
			video.pause();
		}
	}
	function volTogle() {
		$('.glyphicon-volume-up').toggle();
		$('.glyphicon-volume-off').toggle();
		if (video.muted) {
			video.muted = false;
			$("#volbar").slider('value', video.volume);
		} else {
			video.muted = true;
			$("#volbar").slider('value', 0);
		}
	}
	function screenTogle() {
		$('.glyphicon-resize-full').toggle();
		$('.glyphicon-resize-small').toggle();
	}

	function setTime(event, ui) {
		video.currentTime = ui.value;
	}
	function setVol(event, ui) {
		if (ui.value === 0) {
			volTogle();
		} else if (video.volume === 0) {
			volTogle();
		}
		video.volume = ui.value;
	}

	function formatTime(sec) {
		var time = String(("0" + Math.floor(Math.floor(sec) / 60)).slice(-2));
		time += ':' + String(("0" + Math.floor(Math.floor(sec) % 60)).slice(-2));
		return time;
	}

});
