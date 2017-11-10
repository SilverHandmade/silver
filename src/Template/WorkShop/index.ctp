<div>
	<h1>ワークショップ作成</h1>
	<form action="" method="post">
		<?= $this->Form->create('') ?>
		<?= $this->Form->input('投稿日', array('name' =>'Postdate')); ?>
		<?= $this->Form->input('作成者ID', array('name'=>'user')); ?>
		<?= $this->Form->input('制作物ID', array('name' =>'id')); ?>
		<?= $this->Form->input('制作物名', array('name' =>'name')); ?>
		<?= $this->Form->create('Post', array('type'=>'file', 'enctype' => 'multipart/form-data')); ?>
	  <?=$this->Form->input('画像', array('label' => false, 'type' => 'file', 'multiple','name'=>'image')); ?>
		<?= $this->Form->textarea('作成手順', array("cols"=>40, "rows"=>5, "value"=>"",'name'=>'Model/field')); ?>
		<?= $this->Form->submit('送信',array('name'=>'Transmission'));?>
		<?= $this->Form->end() ?>
	</form>

	<<?php
	 	echo $check;
			if ($input_Postdate=$_POST['Postdate']) {
				<?= $this->Form->input('投稿日', array('name' =>'Postdate')); ?>
				# code...
			}
	 ?>
</div>
