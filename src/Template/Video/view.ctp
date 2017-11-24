<?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/video/video.css') ?>
<?php $this->end() ?>
<?php $this->start('script') ?>
	<?= $this->Html->script('/private/js/video/player.js') ?>
<?php $this->end() ?>


<div class="col-md-offset-2 col-md-8">
	<div id="videos">
		<video poster="<?= $this->request->getAttribute("webroot") ?>img/sample.jpg"  id="video">
			<source src="<?= $this->request->getAttribute("webroot") ?>mov/sample.mp4" type='video/mp4;'>
		</video>
		<!-- <button type="button" class="btn trance">
			<span class="glyphicon glyphicon-play"></span>
		</button> -->
		<div class="row" id="controls">
			<div class="col-md-1">
				<button type="button" class="btn trance" id="play">
					<span class="glyphicon glyphicon-play"></span>
				</button>
				<button type="button" class="btn trance none" id="oneTimeStop">
					<span class="glyphicon glyphicon-pause"></span>
				</button>
			</div>

			<div class="col-md-4">
				<div id="seekbar"></div>
			</div>
			<div class="col-md-3">
				<span id="nowTime"></span>/
				<span id="allTime"></span>
			</div>

			<div class="col-md-1">
				<button type="button" class="btn trance" id="mute">
					<span class="glyphicon glyphicon-volume-up"></span>
				</button>
				<button type="button" class="btn trance none" id="unmute">
					<span class="glyphicon glyphicon-volume-off"></span>
				</button>
			</div>

			<div class="col-md-2">
				<div id="volbar"></div>
			</div>

			<div class="col-md-1">
				<button type="button" class="btn trance" id="fullScreen">
					<span class="glyphicon glyphicon-resize-full"></span>
				</button>
				<button type="button" class="btn trance none" id="defScreen">
					<span class="glyphicon glyphicon-resize-small"></span>
				</button>
			</div>
			<!-- <div id="val">テスト用表示領域</div> -->

		</div>
	</div>
</div>





<!-- <div class="col-md-offset-2 col-md-8">
	<div>
		<button class="btn btn-default"  id="play" type="button">再生</button>
		<button class="btn btn-default"  id="oneTimeStop" type="button">一時停止</button>
		<button class="btn btn-default"  id="upVol" type="button">↑</button>
		<button class="btn btn-default"  id="downVol" type="button">↓</button>
		現在（秒）：<span id="ichi">0</span><br>
		全体（秒）：<span id="nagasa"></span><br>

	</div>
</div> -->
