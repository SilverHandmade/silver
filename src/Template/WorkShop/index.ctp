<?php
	$this->start('css');
		echo $this->Html->css('/private/css/workshop/workshop.css');
	$this->end();
	$this->start('script');
		echo $this->Html->script('/private/js/workshop/workshop.js');
	$this->end();
?>
	<form action="" method="Post" class="form-inline">
		<div class="ws-margin">
			<input type="text" name="searchtext" id="searchtext1" class="input-search form-control"/>
			<button type="submit" class="btn btn-success" name="search" id="searchS" value="" onfocus="this.blur();"/>検索</button>
		</div>
	</form>

	<h2>検索結果</h2>
	<?php if ($user_faci[0]['facility_classes_id'] == 1): ?>

		<div class="col-md-12">
			<?= $this->Html->link(">>ワークショップ作成画面へ",['controller' => 'workshop', "action" => "create"]);?>
		</div>
		<div class="col-md-12">
			<?= $this->Html->link(">>ワークショップ編集画面へ",['controller' => 'workshop', "action" => "select"]);?>
		</div>

			<?php foreach ($query as $key): ?>
				<div class="col-md-12">
					<div class="row panel ws-man" >
						<a href="<?= $this->Url->build(["controller" => "WorkShop","action" => "detail", 'id' => $key['id']])?>">
							<div class="row">
								<div class="col-md-3">
									<div align="center">
										<?php if (!empty($key['midasi_url']) && file_exists('img/workshop/'.$key['midasi_url'])): ?>
											<img src="<?= $this->Url->image('workshop/'.$key['midasi_url']) ?>"width="500" height="325">
										<?php else: ?>
											<img src="<?= $this->Url->image('no_image.png') ?>"width="500" height="325">
										<?php endif; ?>									</div>
								</div>
								<div class="col-md-9">
									<div class="row">
										<div class="col-md-12">
											<label for="update">投稿日<?= $key['Postdate'];?></label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<h3><?=$key['name']?></h3>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			<?php endforeach; ?>


	<?php else: ?>
		<?php foreach ($query as $key): ?>
			<div class="col-md-12">
				<div class="row panel ws-man" >
					<a href="<?= $this->Url->build(["controller" => "WorkShop","action" => "detail", 'id' => $key['id']])?>">
						<div class="row">
							<div class="col-md-3">
								<div align="center">
									<img src="<?= $this->Url->image('workshop/'.$key['midasi_url']);?>" width="500" height="325">
								</div>
							</div>
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-12">
										<label for="update">投稿日<?= $key['Postdate'];?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<h3><?=$key['name']?></h3>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
