<?php $this->start('css') ?>
<?= $this->Html->css('/private/css/TopPage/index.css') ?>
<?php $this->end() ?>

<h3>〆切マジか</h3>
<div class="row">
	<?php if($requestCount >= 3): ?>
		<?= $this->element('DeadlineRequest');?>
	<?php else: ?>
		<?php foreach ($request as $key): ?>
			<div class="col-md-4">
				<div id="panel">
					<table>
						<tr>
							<td>制作物ID</td>
							<td><?= $key['product_id'];?></td>
						</tr>
						<tr>
							<td>タイトル</td>
							<td><?= $key['title'];?></td>
						</tr>
						<tr>
							<td>締切日</td>
							<td><?= $key['To_date'];?></td>
						</tr>
					</table>

					<div id="details">
						<a href="/silver">詳細 >></a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
<div class="row right" id="linkTo">
	<?= $this->Html->link(">>依頼一覧へ",['controller' => 'request', "action" => "index"]);?>
</div>


<?= $this->element('DeadlineRequest');?>

<div class="row right" id="linkTo">
	<?= $this->Html->link(">>ワークショップへ",['controller' => 'workshop', "action" => "index"]);?>
</div>
