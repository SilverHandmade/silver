<div class="col-md-offset-2 col-md-8">
	<div class="row">
		<div id="title">
			<h2>詳細画面</h2>
		</div>
		<div id="detailtbl" class="table">
			<?php if ($user_faci[0]['facility_classes_id'] == 1): ?>
			<div class="col-md-12">
				<?= $this->Html->link(">>ワークショップ編集画面へ",['controller' => 'WorkShop', "action" => "select"]);?>
			</div>
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
									<img src="<?= $this->Url->image('workshop/'.$key['photo_url'])?>" class="img-size">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p><?php echo $key['description'] ?></p>
								</div>
							</div>
						</div>
						<div align="center">
							<?php if (!empty($key['photo_url']) && file_exists('img/workshop/'.$key['photo_url'])): ?>
								<img src="<?= $this->Url->image('workshop/'.$key['photo_url']) ?>"width="500" height="325">
							<?php else: ?>
								<img src="<?= $this->Url->image('no_image.png') ?>"width="500" height="325">
							<?php endif; ?>					</div>
						<div align="center">
							<p><?php echo $key['description'] ?></p>
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
									<img src="<?= $this->Url->image('workshop/'.$key['photo_url'])?>" class="img-size">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p><?php echo $key['description'] ?></p>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
		<?php endif; ?>
	</div>
		<div class="row">
			<div class="col-md-12 right">
				<?= $this->Html->link("戻る",['controller' => 'WorkShop', "action" => "index"], ['class'=>'btn btn-primary']);?>
				<?= $this->Html->link("トップページへ",['controller' => 'TopPage', "action" => "index"], ['class'=>'btn btn-primary']);?>
			</div>
		</div>
	</div>
</div>
