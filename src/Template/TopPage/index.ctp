<?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/TopPage/index.css') ?>
<?php $this->end() ?>

<?php if (!$user['registFlg']):?>
	<h2 class="danger" >〆切マジか</h2>
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

<h2>新着ワークショップ</h2>
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
