<div>
	<h1>ワークショップ検索画面</h1>
	<form action="",method="Post">
	<?= $this->form->input('制作物名',array('name'=>'production','id'=>'ProductionS'));?>
	<?= $this->Form->button('検索',array('name'=>'search','id'=>'searchS'));?>
</form>


<?php
	$this->start('script');
	echo $this->Html->script('/private/js/workshop/workshop.js');
	$this->end();
 ?>
<div>
