$(function(){
	var v = $('#video');

	function getDuration() {
		//動画の長さ（秒）を表示
		document.getElementById("nagasa").innerHTML = v.duration;
	}

	$('#play').click(function(event) {
		//再生完了の表示をクリア
		document.getElementById("kanryou").innerHTML = "";
		//動画を再生
		v.play();
		//現在の再生位置（秒）を表示
		v.addEventListener("timeupdate", function(){
			document.getElementById("ichi").innerHTML = v.currentTime;
		}, false);
		//再生完了を知らせる
		v.addEventListener("ended", function(){
			document.getElementById("kanryou").innerHTML = "動画の再生が完了しました。";
		}, false);
	});

	$('#oneTimeStop').click(function(event) {
		//動画を一時停止
		v.pause();
	});

	$('#upVol').click(function(event) {
		//音量を上げる
		v.volume = v.volume + 0.25;
	});

	$('#downVolume').click(function(event) {
		//音量を下げる
		v.volume = v.volume - 0.25;
	});

});
