<?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/video/video.css') ?>
<?php $this->end() ?>
<?php $this->start('script') ?>
	<?= $this->Html->script('/private/js/video/player.js') ?>
<?php $this->end() ?>

<div class="col-md-offset-2 col-md-8">
	<h2><?= $video['title'] ?></h2>
	<div class="row" id="videos">
		<div class="col-md-12" id="player">
			<video poster="<?= $this->request->getAttribute("webroot") ?>img/sample.jpg" id="video">
				<source src="<?= $this->request->getAttribute("webroot") ?>mov/sample.mp4" preload="metadata" type='video/mp4;'>
				<p>video要素がサポートされていないブラウザでご覧になっています。</p>
			</video>
		</div>
		<div class="col-md-12 " id="controls">
			<div class="control-button">
				<button type="button" class="btn trance" id="playStop">
					<span class="glyphicon glyphicon-play"></span>
					<span class="glyphicon glyphicon-pause none"></span>
				</button>
			</div>

			<div id="seekbar"></div>
			<div id="progressbar"></div>

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
	<div class="row" id="nextVideo">
		<div class="col-md-12">
			<div id="Carousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="../img/sample-1140x500.png" alt="First slide">
					</div>
					<div class="item">
						<img src="../img/sampleB-1140x500.png" alt="Second slide">
					</div>
					<div class="item">
						<img src="../img/sampleC-1140x500.png" alt="Third slide">
					</div>
				</div>
				<a class="left carousel-control" href="#Carousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">前へ</span>
				</a>
				<a class="right carousel-control" href="#Carousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">次へ</span>
				</a>
			</div>
		</div>
	</div>

</div>
