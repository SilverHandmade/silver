<?php $this->start('css') ?>
<?= $this->Html->css('/private/css/TopPage/index.css') ?>
<?php $this->end() ?>

<h3>〆切マジか</h3>
<?= $this->element('DeadlineRequest');?>

<div class="row right" id="linkTo">
	<?= $this->Html->link(">>依頼一覧へ",['controller' => 'request', "action" => "index"]);?>
</div>

<?= $this->element('DeadlineRequest');?>

<div class="row right" id="linkTo">
	<?= $this->Html->link(">>ワークショップへ",['controller' => 'workshop', "action" => "index"]);?>
</div>
