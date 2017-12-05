
<?php $this->start('css') ?>
   <?= $this->Html->css('/private/css/workshop/index.css') ?>
<?php $this->end() ?>

<div>
	<h1>ワークショップ検索画面</h1>
	<form action="" method="Post">
		<input type="text" name="searchtext" id="searchtext1"/>
		<input type="submit" class="btn" name="search" id="searchS" value="検索" onfocus="this.blur();"/>
	</form>

	<h2>検索結果</h2>

	<div class="col-md-12">
		<?= $this->Html->link(">>ワークショップ作成画面へ",['controller' => 'workshop', "action" => "create"]);?>
	</div>
		<div class="row">
			<?php foreach ($query as $key): ?>

				<form action="/silver/WorkShop/detailses" method="POST" >
					<input type=hidden name=product_id value=<?php echo $key['id']?>>
					<div class="col-md-3">
						<div class="panel">
							<a href="">
								<td class="col-md-2">
									<label for="update">投稿日<?= $key['Postdate'];?></label>
								</td>
								<div align="center"><img src="<?= $this->Url->image('workshop/'.$key['midasi_url'])?>" width="500" height="325"></div>								<h3><?= $key['name'];?></h3>
								<div class="row">
									<div class="col-md-12 right">
										<input type="submit" value="次画面へ遷移">
									</div>
								</div>
							</a>
						</div>
					</div>
				</form>

			<?php endforeach; ?>
		</div>
<?php
	$this->start('script');
	echo $this->Html->script('/private/js/kota/workshop.js');
	$this->end();
?>
<div>
