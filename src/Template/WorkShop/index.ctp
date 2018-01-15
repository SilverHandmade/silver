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
	<?php if ($user_faci[0]['facility_classes_id'] == 1): ?>
		<div class="row">
			<div class="col-md-12 right">
				<div id="wlinks">
					<?= $this->Html->link(">>ワークショップ作成画面へ",['controller' => 'WorkShop', "action" => "create"]);?>
					<br class="br none">
					<?= $this->Html->link(">>ワークショップ編集画面へ",['controller' => 'WorkShop', "action" => "select"]);?>
				</div>
			</div>
		</div>
		<div id="title-index">
			<h2>検索結果</h2>
		</div>
		<?php foreach ($query as $key): ?>
			<div class="col-md-12">
				<div class="row panel ws-man" >
					<a href="<?= $this->Url->build(["controller" => "WorkShop","action" => "detail", 'id' => $key['id']])?>">
						<div class="row">
							<div class="col-md-3 center">
								<?php if (!empty($key['midasi_url']) && file_exists('img/workshop/'.$key['midasi_url'])): ?>
									<img src="<?= $this->Url->image('workshop/'.$key['midasi_url']) ?>">
								<?php else: ?>
									<img src="<?= $this->Url->image('no_image.png') ?>">
								<?php endif; ?>
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
		<div id="title-index">
			<h2>検索結果</h2>
		</div>
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
