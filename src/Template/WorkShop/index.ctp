
<?php $this->start('css') ?>
   <?= $this->Html->css('/private/css/workshop/index.css') ?>
<?php $this->end() ?>

<div>
	<h1>ワークショップ検索画面</h1>
	<form action="" method="Post">
		<input type="text" name="searchtext" id="searchtext1"/>
		<input type="submit" class="btn btn-success" name="search" id="searchS" value="検索" onfocus="this.blur();"/>
	</form>

	<h2>検索結果</h2>

	<div class="col-md-12">
		<?= $this->Html->link(">>ワークショップ作成画面へ",['controller' => 'workshop', "action" => "create"]);?>
	</div>

		<div class="row">
			<?php foreach ($query as $key): ?>
				<div class="col-md-3">
					<div class="panel">
						<a href="">
							<img src="<?= $this->Url->image(file_exists($key['midasi_url'])?$key['midasi_url']:'workshop/sample.png');?>">
							<h3><?= $key['name'];?></h3>
							<div class="row">
								<div class="col-md-12 right">
									<?= $this->Html->link(">>詳細",['controller' => 'workshop', "action" => "detailses"]);?>
								</div>
							</div>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

<?php
	$this->start('script');
	echo $this->Html->script('/private/js/kota/workshop.js');
	$this->end();
?>
<div>
