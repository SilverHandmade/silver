$(function(){
	var video = $('#video').get(0);
	var videos = $('#videos').get(0);
	var $canvas = $('#poster');

	$(window).on('load',function(){
		if (video.networkState == 3) {
			$('#img_no_video').removeClass('none');
			$('#screen').addClass('none');
			exit();
		}
		// 動画の再生時間表示
		$('#allTime').html(formatTime(video.duration));
		$("#seekbar").slider({
			max: Math.floor(video.duration)
		});

		$("#progressbar").progressbar({
			max: Math.floor(video.duration)
		});

		// サムネイルの表示
		// $canvas.attr('width', $('#video').width());
		// $canvas.attr('height', $('#video').height());
		// $canvas[0].getContext('2d').drawImage(video, 0, 0, $canvas.width(), $canvas.height());
		// サムネイルの表示
	});
	$("#progressbar").progressbar({
		max: 1,
		value: 0
	});

	$("#seekbar").slider({
		step: 1,
		range: "min",
		option: 'animate',
		slide: setTime
	});
	$("#volbar").slider({
		max: 1,
		step: 0.01,
		range: "min",
		value:1,
		option: 'animate',
		slide: setVol
	});
	$('#allTime').html(formatTime(0));
	$('#nowTime').html(formatTime(0));


	$('#playStop').click(function (){
		startTogle()
	});
	$('#start').click(function (){
		startTogle()
	});
	// $('#video').click(function (){
	// 	startTogle()
	// });


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

	// $('#videos').mousemove(function() {
	// 	$('#controls').fadeTo('400', 1);
	// 	$('#controls').delay(700).fadeTo('400', 0.5);
	// });
	// var cont = $('#controls'),
	// delayTime = 100;
	// moveTimer = 0;
	// $('#videos').on('mousemove', function(){
	// 	clearTimeout(moveTimer);
	// 	cont.fadeTo('400', 1);
	// 	moveTimer = setTimeout(function(){
	// 		cont.fadeTo('400', 0);
	// 	}, delayTime);
	// }).on('mouseout', function(){
	// 	clearTimeout(moveTimer);
	// 	cont.fadeTo('400', 0);
	// });
	var con = 0;
	function updatebuffer() {
		var buffer = video.buffered;
		var lastIdx = buffer.length - 1;
		var buffEnd = buffer.end(lastIdx);
		$("#progressbar").progressbar({
			value: Math.floor(buffEnd)
		});
		if (Math.floor(video.duration) == $("#progressbar").progressbar('value')) {
			clearInterval(progressFlg);
		}
	}
	var progressFlg = setInterval(function(){
		updatebuffer();
	},1000);

	function startTogle() {
		$canvas.hide();
		$('.glyphicon-play').toggle();
		$('.glyphicon-pause').toggle();
		if (video.paused) {
			video.play();
		} else {
			video.pause();
		}
	}

	function screenTogle() {
		$('.glyphicon-resize-full').toggle();
		$('.glyphicon-resize-small').toggle();
		if ($('#controls').css('margin-top') == '0px') {
			$('#controls').css({'margin-top':$('#controls').get(0).scrollHeight * -1 + 'px','opacity': '0.65'})
			$('#start').css({'max-height':'calc(100% - ' + $('#controls').get(0).scrollHeight + 'px)'})
		} else {
			$('#controls').css({'margin-top':'0','opacity': '1'})
			$('#start').css({'max-height':'100%'})
		}
	}

	function setTime(event, ui) {
		video.currentTime = ui.value;
	}

	$('#mute').click(function() {
		volTogle();
	});
	function volTogle() {
		$('.glyphicon-volume-up').toggle();
		$('.glyphicon-volume-off').toggle();
		if (video.muted) {
			video.muted = false;
			if (video.volume == 0) {
				video.volume = 1;
			}
			$("#volbar").slider('value', video.volume);
		} else {
			video.muted = true;
			$("#volbar").slider('value', 0);
		}
	}
	function setVol(event, ui) {
		video.volume = ui.value;
		if (ui.value == 0) {
			volTogle();
		} else {
			video.muted = false;
			$('.glyphicon-volume-off').hide();
			$('.glyphicon-volume-up').show();
		}
	}

	function formatTime(sec) {
		var time = String(("0" + Math.floor(Math.floor(sec) / 60)).slice(-2));
		time += ':' + String(("0" + Math.floor(Math.floor(sec) % 60)).slice(-2));
		return time;
	}

});
