<?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/TopPage/index.css') ?>
<?php $this->end() ?>

<div>
		<h1>ワークショップ検索画面</h1>
			<form action="",method="Post">
				<input type="text",id="text",name="text",value=""/><button type="button",id="searchS",name="search",value=""/>検索</button>
			</form>

				<h2>検索結果</h2>
				<div class="row">
					<?php foreach ($workshop as $key): ?>
						<div class="col-md-3">
							<div class="panel">
								<a href="/create">
									<img src="<?= $this->request->getAttribute("webroot") ?>img/<?= file_exists($key['midasi_url'])?$key['midasi_url']:"no_image.png";?>">
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

<?php
	$this->start('script');
	echo $this->Html->script('/private/js/workshop/workshop.js');
	$this->end();
 ?>
<div>
