<div>
	<h1>ワークショップ作成</h1>
	<form action="" method="post">
		<?= $this->Form->create('') ?>
		<?= $this->Form->input('Postdate') ?>
		<?= $this->Form->input('user') ?>
		<?= $this->Form->input('id') ?>
		<?= $this->Form->input('name') ?>
		<?= $this->Form->create('Post', array('type'=>'file', 'enctype' => 'multipart/form-data')); ?>
	  <?=$this->Form->input('image', array('label' => false, 'type' => 'file', 'multiple')); ?>
		<?= $this->Form->textarea("Model/field", array("cols"=>40, "rows"=>5, "value"=>"")); ?>
		<?= $this->Form->submit('Transmission')?>
		<?= $this->Form->end() ?>
	</form>
</div>
