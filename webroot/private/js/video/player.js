$(function(){
	var video = $('#video').get(0);


	$(document).ready(function(){
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

	$('#fullScreen').click(function() {
		if (video.requestFullscreen) {
		  video.requestFullscreen();
		} else if (video.mozRequestFullScreen) {
		  video.mozRequestFullScreen();
		} else if (video.webkitRequestFullscreen) {
		  video.webkitRequestFullscreen();
		}
	});
	// $('#defScreen').click(function() {
	// 	if (video.requestFullscreen) {
	// 	  video.requestFullscreen();
	// 	} else if (video.mozRequestFullScreen) {
	// 	  video.mozRequestFullScreen();
	// 	} else if (video.webkitRequestFullscreen) {
	// 	  video.webkitRequestFullscreen();
	// 	}
	// });

	$('#mute').click(function() {
		video.muted = true;
		$("#volbar").slider('value', 0);
		volTogle();
	});

	$('#unmute').click(function() {
		video.muted = false;
		$("#volbar").slider('value', video.volume);
		volTogle();
	});

	$('#play').click(function (){
		//動画を再生
		video.play();
	});
	$('#oneTimeStop').click(function() {
		//動画を一時停止
		video.pause();
	});
	video.addEventListener("timeupdate", function(){
		$('#seekbar').slider('value', Math.floor(video.currentTime));
		$('#nowTime').html(formatTime(video.currentTime));
	}, false);
	video.addEventListener("play", function(){
		startTogle();
	}, false);
	video.addEventListener("pause", function(){
		startTogle();
	}, false);

	$('#controls').hover(function() {
		$(this).fadeTo('slow/400/fast', 1);
	}, function() {
		$(this).fadeTo('slow/400/fast', 0.2);
	});

	function startTogle() {
		$('#oneTimeStop').toggle();
		$('#play').toggle();
	}
	function volTogle() {
		$('#mute').toggle();
		$('#unmute').toggle();
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
