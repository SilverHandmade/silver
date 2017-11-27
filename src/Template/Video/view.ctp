<?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/video/video.css') ?>
<?php $this->end() ?>
<?php $this->start('script') ?>
	<?= $this->Html->script('/private/js/video/player.js') ?>
<?php $this->end() ?>


<div class="col-md-offset-2 col-md-8" id="videos">
	<video poster="<?= $this->request->getAttribute("webroot") ?>img/sample.jpg"  id="video">
		<source src="<?= $this->request->getAttribute("webroot") ?>mov/sample.mp4" type='video/mp4;'>
		<p>video要素がサポートされていないブラウザでご覧になっています。</p>
	</video>
	<span class="glyphicon glyphicon-play" id="start"></span>
	<div class="row" id="controls">
		<div class="control-button">
			<button type="button" class="btn trance" id="playStop">
				<span class="glyphicon glyphicon-play"></span>
				<span class="glyphicon glyphicon-pause none"></span>
			</button>
		</div>

		<div id="seekbar"></div>
		<div id="time">
			<span id="nowTime"></span>/
			<span id="allTime"></span>
		</div>
		<div class="control-button">
			<button type="button" class="btn trance" id="mute">
				<span class="glyphicon glyphicon-volume-up"></span>
				<span class="glyphicon glyphicon-volume-off none"></span>
			</button>
		</div>

		<div id="volbar"></div>
		<div class="control-button">
			<button type="button" class="btn trance" id="fullScreen">
				<span class="glyphicon glyphicon-resize-full"></span>
				<span class="glyphicon glyphicon-resize-small none"></span>
			</button>
		</div>

	</div>
</div>
