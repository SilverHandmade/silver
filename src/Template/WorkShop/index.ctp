<div>
	<h1>ワークショップ作成</h1>
	<?= $this->Form->create() ?>
	<?= $this->Form->input('Day') ?>
	<?= $this->Form->input('Facility') ?>
	<?= $this->Form->create('Post', array('type'=>'file', 'enctype' => 'multipart/form-data')); ?>
  <?=$this->Form->input('Post.image', array('label' => false, 'type' => 'file', 'multiple')); ?>
	<?= $this->Form->textarea("Model/field", array("cols"=>40, "rows"=>5, "value"=>"")); ?>
	<?= $this->Form->submit('Transmission')?>
	<?= $this->Form->end() ?>
</div>
