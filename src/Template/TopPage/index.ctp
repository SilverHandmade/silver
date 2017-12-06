 <?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/TopPage/index.css') ?>
<?php $this->end() ?>

<div class="col-md-12">
	<?php if (!$user['registFlg']):?>
		<h2 class="danger" >〆切マジか</h2>
		<div class="row">
			<?php foreach ($request as $key): ?>
				<?= $this->element('DeadlineRequest', ["key" => $key]);?>
			<?php endforeach; ?>
		</div>
		<div class="row right" id="linkTo">
			<div class="col-md-12">
				<?= $this->Html->link(">>依頼一覧へ",['controller' => 'request', "action" => "list"]);?>
			</div>
		</div>
	<?php endif; ?>
	<h2>新着ワークショップ</h2>
	<div class="row">
		<?php foreach ($workshop as $key): ?>
			<div class="col-md-3">
				<div class="panel">
					<a href="">
						<img src="<?= $this->Url->image(file_exists($key['midasi_url'])?$key['midasi_url']:"no_image.png");?>">
						<h3><?= $key['name'];?></h3>
						<div class="row">
							<div class="col-md-12 right">
								<button class="btn btn-link" type="button" >詳細 >></button>
							</div>
						</div>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="row right" id="linkTo">
		<div class="col-md-12">
			<?= $this->Html->link(">>ワークショップ一覧へ",['controller' => 'request', "action" => "index"]);?>
		</div>
	</div>

	<h2>新着知恵袋</h2>
	<div class="row">
		<?php foreach ($witses as $key): ?>
			<div class="col-md-3">
				<div class="panel">
					<a href="<?= $this->Url->build(["controller" => "request","action" => "detail", 'id' => $key['id']])?>">
						<table class="table">
							<tr>
								<td><h3><?= $key['title'];?></h3></td>
							</tr>
							<tr>
								<td>
									<div><?= $key['Postdate'];?></div>
								</td>
							</tr>
						</table>
						<div class="row">
							<div class="col-md-12 right">
								<a href="<?= $this->Url->build(["controller" => "request","action" => "detail", 'id' => $key['id']])?>">詳細 >></a>
							</div>
						</div>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="row right" id="linkTo">
		<div class="col-md-12">
			<?= $this->Html->link(">>知恵袋一覧へ",['controller' => 'request', "action" => "list"]);?>
		</div>
	</div>
</div>
