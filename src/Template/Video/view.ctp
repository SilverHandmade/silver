<?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/video/video.css') ?>
<?php $this->end() ?>
<?php $this->start('script') ?>
	<?= $this->Html->script('/private/js/video/player.js') ?>
<?php $this->end() ?>

<div class="col-md-offset-2 col-md-8" id="player">
	<h2><?= $video['title'] ?></h2>
	<div class="row" id="videos">
		<div class="col-md-12" id="screen">
			<!-- <canvas id="poster"></canvas> -->
			<video id="video">
				<source src="<?= $this->request->getAttribute("webroot") ?>mov/sample2.mp4" preload="metadata" type='video/mp4;'>
				<p>video要素がサポートされていないブラウザでご覧になっています。</p>
			</video>
			<button type="button" class="btn trance" id="start">
				<span class="glyphicon glyphicon-play"></span>
			</button>
		</div>

		<div id="controls">
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

	<div id="nextVideo">
		<div id="Carousel" class="carousel slide" data-ride="carousel" data-interval="false">
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<div class="row">
						<div class="col-md-offset-1 col-md-10 center">
							<a href="">
								<img src="<?= $this->Url->image("sample.jpg") ?>" alt="First slide">
							</a>
							<a href="">
								<img src="<?= $this->Url->image("sample.jpg") ?>" alt="First slide">
							</a>
							<a href="">
								<img src="<?= $this->Url->image("sample.jpg") ?>" alt="First slide">
							</a>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="row">
						<div class="col-md-offset-1 col-md-10 center">
							<a href="">
								<img src="<?= $this->Url->image("sample.jpg") ?>" alt="Second slide">
							</a>
							<a href="">
								<img src="<?= $this->Url->image("sample.jpg") ?>" alt="Second slide">
							</a>
							<a href="">
								<img src="<?= $this->Url->image("sample.jpg") ?>" alt="Second slide">
							</a>
						</div>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#Carousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			</a>
			<a class="right carousel-control" href="#Carousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			</a>
		</div>
	</div>
</div>
