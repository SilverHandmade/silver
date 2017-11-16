<?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/video/video.css') ?>
<?php $this->end() ?>
<?php $this->start('script') ?>
	<?= $this->Html->script('/private/js/video/video.js') ?>
<?php $this->end() ?>


<div class="col-md-offset-2 col-md-8">
	<div>
		<video controls poster="<?= $this->request->getAttribute("webroot") ?>img/sample.jpg">
			<source src="<?= $this->request->getAttribute("webroot") ?>mov/sample.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
		</video>
	</div>
</div>
