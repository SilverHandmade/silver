 <?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/TopPage/TopPage.css') ?>
<?php $this->end() ?>

<div class="col-md-12">
	<?php if ($userinfo['loginFlg']):?>
		<h2 class="danger" >〆切マジか</h2>
		<div class="row">
			<?php foreach ($request as $key): ?>
				<?= $this->element('TopPage/DeadlineRequest', ['key' => $key]);?>
			<?php endforeach; ?>
		</div>
		<div class="row right" id="linkTo">
			<div class="col-md-12">
				<?= $this->Html->link('依頼一覧へ >>',['controller' => 'request', 'action' => 'lists']);?>
			</div>
		</div>
	<?php endif; ?>

	<h2>新着ワークショップ</h2>
	<div class="row">
		<?php foreach ($workshop as $key): ?>
			<div class="col-md-3">
				<div class="panel">
					<a href="<?= $this->Url->build(['controller' => 'WorkShop', 'action' => 'detail', 'id' => $key['id']])?>">
						<?php if (!empty($key['midasi_url']) && file_exists('img/workshop/'.$key['midasi_url'])): ?>
							<img src="<?= $this->Url->image('workshop/'.$key['midasi_url']) ?>">
						<?php else: ?>
							<img src="<?= $this->Url->image('no_image.png') ?>">
						<?php endif; ?>
						<h3><?= $key['name'];?></h3>
						<div class="row">
							<div class="col-md-12 right">
								<button class="btn btn-link">詳細 >></button>
							</div>
						</div>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

	<div class="row right" id="linkTo">
		<div class="col-md-12">
			<?= $this->Html->link('ワークショップ一覧へ >>',['controller' => 'WorkShop', 'action' => 'index']);?>
		</div>
	</div>

	<h2>新着知恵袋</h2>
	<div class="row">
		<?php foreach ($witses as $key): ?>
			<div class="col-md-3">
				<div class="panel">
					<a href="<?= $this->Url->build(['controller' => 'answers', 'action' => 'detail', 'id' => $key['id']])?>">
						<div class="row">
							<div class="col-md-12">
								<ul class="list-group">
									<li class="list-group-item">
										<h3><?= $key['title'];?></h3>
									</li>
									<li class="list-group-item">
										<?= $key['Postdate'];?>
									</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 right">
								<button type="button" class="btn btn-link">詳細 >></button>
							</div>
						</div>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="row right" id="linkTo">
		<div class="col-md-12">
			<?= $this->Html->link('知恵袋一覧へ >>',['controller' => 'answers', 'action' => 'index']);?>
		</div>
	</div>
</div>
