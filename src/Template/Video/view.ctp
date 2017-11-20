<?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/video/video.css') ?>
<?php $this->end() ?>
<?php $this->start('script') ?>
	<?= $this->Html->script('/private/js/video/player.js') ?>
<?php $this->end() ?>


<div class="col-md-offset-2 col-md-8">
	<div>
		<video controls poster="<?= $this->request->getAttribute("webroot") ?>img/sample.jpg" id="video">
			<source src="<?= $this->request->getAttribute("webroot") ?>mov/sample.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
		</video>
	</div>
</div>

<!-- <div style="width:400px; background-color:#333333; color:#ffffff;">
<input type="button" value="再生" onClick="playVideo()" id="play">
<input type="button" value="一時停止" onClick="pauseVideo()" id="oneTimeStop">
<input type="button" value="↑" onClick="upVolume()" id="upVol">
<input type="button" value="↓" onClick="downVolume()" id="downVol">
<br>
現在（秒）：<span id="ichi">0</span><br>
全体（秒）：<span id="nagasa"></span><br>
<span id="kanryou"></span>
</div> -->
