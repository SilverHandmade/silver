<?php $this->start('title'); ?>
ワークショップ 詳細-
<?php $this->end(); ?>
<?php $this->start('css'); ?>
	<?= $this->Html->css('/private/css/workshop/workshop.css') ?>
<?php $this->end(); ?>

<div class="col-md-offset-2 col-md-8">
	<div class="row">
		<div class="col-md-12">
			<div id="title">
				<h2>詳細画面</h2>
			</div>
			<?php if ($user_faci[0]['facility_classes_id'] == 1): ?>
				<?php foreach ($detailses as $key) : ?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="">
									<?php echo $key['name'] ?>
								</div>
								<div class="col-md-12">
									<h3>手順<?php echo $key['ren'] + 1 ?></h3>
								</div>
							</div>
							<div class="row">
								<div align="center" class="col-md-12">
									<?php if (!empty($key['photo_url']) && file_exists('img/workshop/'.$key['photo_url'])): ?>
										<img src="<?= $this->Url->image('workshop/'.$key['photo_url']) ?>" class="img-size">
									<?php else: ?>
										<img src="<?= $this->Url->image('no_image.png') ?>" class="img-size">
									<?php endif; ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 ws-font">
									<p><?php echo $key['description'] ?></p>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<?php foreach ($detailses as $key) : ?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<h3>手順<?php echo $key['ren'] + 1 ?></h3>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<?php if (!empty($key['photo_url']) && file_exists('img/workshop/'.$key['photo_url'])): ?>
										<img src="<?= $this->Url->image('workshop/'.$key['photo_url']) ?>" id="ws-img" class="img-js img-size">
									<?php else: ?>
										<img src="<?= $this->Url->image('no_image.png') ?>" class="img-size">
									<?php endif; ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 ws-font">
									<p><?php echo $key['description'] ?></p>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
			<div class="row">
				<div class="col-md-12 right">
					<?= $this->Html->link("戻る",['controller' => 'WorkShop', "action" => "index"], ['class'=>'btn btn-primary']);?>
					<?= $this->Html->link("トップページへ",['controller' => 'TopPage', "action" => "index"], ['class'=>'btn btn-primary']);?>
				</div>
			</div>
		</div>
	</div>
</div>
