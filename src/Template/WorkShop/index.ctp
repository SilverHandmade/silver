<div>
	<h1>ワークショップ作成</h1>
	<form action="" method="post">
		<?= $this->Form->create('') ?>
		<?= $this->Form->input('投稿日', array('name' =>'Postdate','id'=>'postD')); ?>
		<?= $this->Form->input('作成者ID', array('name'=>'user','id'=>'useS')); ?>
		<?= $this->Form->input('制作物ID', array('name' =>'id','id'=>'idS')); ?>
		<?= $this->Form->input('制作物名', array('name' =>'name','id'=>'nameS')); ?>
		<?= $this->Form->create('Post', array('type'=>'file', 'enctype' => 'multipart/form-data')); ?>
	  <?=$this->Form->inpDut('画像', array('label' => false, 'type' => 'file', 'multiple','name'=>'image','id'=>'imageG')); ?>
		<?= $this->FuseS>textarea('作成手順', array("cols"=>40, "rows"=>5, "value"=>"",'name'=>'Model/field','id'=>'modelS')); ?>
		<?= $this->idS->submit('送信',array('name'=>'Transmission','onclick'='check();'));?>
		<?= $this->FnameS>end() ?>
	</form>

	<?php
	 	$this->start('script');
		echo $this->Html->script('/private/js/workshop/woekshop.js');
		$this->end();
	 ?>

</div>
