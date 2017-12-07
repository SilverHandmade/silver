
<?php $this->start('css') ?>
   <?= $this->Html->css('/private/css/workshop/index.css') ?>
<?php $this->end() ?>


	<form action="" method="Post">
		<input type="text" name="searchtext" id="searchtext1"/>
		<input type="submit" class="btn" name="search" id="searchS" value="検索" onfocus="this.blur();"/>
	</form>

	<h2>検索結果</h2>


	<div class="col-md-12">
		<?= $this->Html->link(">>ワークショップ作成画面へ",['controller' => 'workshop', "action" => "create"]);?>
	</div>

			<?php foreach ($query as $key): ?>
				<div class="row panel">
						<a href="<?= $this->Url->build(["controller" => "workshop","action" => "detailses", 'id' => $key['id']])?>">
						<div class="col-md-3">
							<label for="update">投稿日<?= $key['Postdate'];?></label>
							<h3><?=$key['name']?></h3>
							<div align="center"><img src="<?= $this->Url->image('workshop/'.$key['midasi_url'])?>" width="500" height="325"></div>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
</div>
<?php
	$this->start('script');
	echo $this->Html->script('/private/js/kota/workshop.js');
	$this->end();
?>
<div>
