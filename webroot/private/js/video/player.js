$(function(){
	var video = $('#video').get(0);

	$(document).ready(function () {
		$('#nowTime').text(video.currentTime);
		var allTime = String.valueOf(Math.floor(Math.floor(video.duration) / 60)) + ':' + String.valueOf(video.duration % 60);
		$('#allTime').text(allTime);

		$("#seekbar").slider({
			max: video.duration,
			step: 1,
			change: showValue
		});
		$("#volbar").slider({
			max: 1,
			step: 0.2,
			value: 1,
			change: showValue
		});

		// $("#update").click(function () {
		// 	$("#slider").slider("option", "value", $("#seekTo").val());
		// });


		function showValue(event, ui) {
			$("#val").html(ui.value);
		}
	});

	$('#play').click(function (){
		//動画を再生
		video.play();
		togleStart();
	});

	$('#oneTimeStop').click(function() {
		//動画を一時停止
		video.pause();
		togleStart();
	});

	function togleStart() {
		$('#oneTimeStop').toggle();
		$('#play').toggle();
	}



});
