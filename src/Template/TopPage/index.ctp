<?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/TopPage/index.css') ?>
<?php $this->end() ?>

<?php if (!$user['registFlg']):?>
	<h3>〆切マジか</h3>
	<div class="row">
		<?php foreach ($request as $key): ?>
			<?= $this->element('DeadlineRequest', ["key" => $key]);?>
		<?php endforeach; ?>
	</div>
	<div class="row right" id="linkTo">
		<div class="col-md-12">
			<?= $this->Html->link(">>依頼一覧へ",['controller' => 'request', "action" => "index"]);?>
		</div>
	</div>
<?php endif; ?>


<h3>新着ワークショップ</h3>
<div class="row">
	<?php foreach ($request as $key): ?>
		<?= $this->element('DeadlineRequest', ["key" => $key]);?>
	<?php endforeach; ?>
</div>
<div class="row right" id="linkTo">
	<div class="col-md-12">
		<?= $this->Html->link(">>ワークショップ一覧へ",['controller' => 'request', "action" => "index"]);?>
	</div>
</div>
