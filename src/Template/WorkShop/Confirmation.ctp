<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();

	$this->start('css');
	echo $this->Html->css('/private/css/request/request.css');
	$this->end();

?>
<div class="col-md-offset-2 col-md-8">
	<div class="row center">
		<h2>確認画面</h2>
		<form class="" action="" method="POST">
		</form>
