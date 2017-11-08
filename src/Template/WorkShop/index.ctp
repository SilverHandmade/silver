<?php $this->start('css'); ?>
  <?= $this->Html->css('/private/css/kota/workshop.css') ?>
  <?= $this->Html->css('/webroot/css/src/bootstrap.css')?>
  <?= $this->Html->css('workshop.css') ?>
	<?= $this->Html->js('/private/js/kota/workshop.js') ?>
<?php $this->end(); ?>

<div id="dropArea">画像をここへドラッグ＆ドロップ</div>
<input id="fileInput" type="file" accept="image/*" multiple>
<div id="output"></div>
