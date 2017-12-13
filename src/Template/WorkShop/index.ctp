
<?php
	$this->start('css');
		echo $this->Html->css('/private/css/workshop/index.css');
	$this->end();
	$this->start('script');
		echo $this->Html->script('/private/js/kota/workshop.js');
	$this->end();

?>

	<form action="" method="Post" class="form-inline">
		<div class="ws-margin">
			<input type="text" name="searchtext" id="searchtext1" class="input-search form-control"/>
			<input type="submit" class="btn btn-success" name="search" id="searchS" value="検索" onfocus="this.blur();"/>
		</div>
	</form>

	<h2>検索結果</h2>

	<div class="col-md-12">
		<?= $this->Html->link(">>ワークショップ作成画面へ",['controller' => 'workshop', "action" => "create"]);?>
	</div>

	<div class="col-md-12">
		<?= $this->Html->link(">>ワークショップ編集画面へ",['controller' => 'workshop', "action" => "select"]);?>
	</div>
	<?php foreach ($query as $key): ?>
		<div class="col-md-12">
			<div class="row panel ws-man" >
				<a href="<?= $this->Url->build(["controller" => "workshop","action" => "detailses", 'id' => $key['id']])?>">
					<div class="col-md-3">
						<div align="center">
							<img src="<?= $this->Url->image('workshop/'.$key['midasi_url'])?>" width="500" height="325">
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
				</a>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<div>
