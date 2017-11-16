
<?php $this->start('css') ?>
   <?= $this->Html->css('/private/css/TopPage/index.css') ?>
<?php $this->end() ?>

<div>
	<h1>ワークショップ検索画面</h1>
	<form action="" method="Post">
		<?= $this->Form->input('制作物名', array('name'=>'searchtext','id'=>'searchtext1')); ?>
		<?= $this->Form->submit('検索',array('name'=>'search','id'=>'searchS'));?>
	</form>

	<h2>検索結果</h2>
		<div class="row">
			<?php foreach ($query as $key): ?>
				<div class="col-md-3">
					<div class="panel">
						<a href="">
							<img src="<?= $this->Url->image(file_exists($key['midasi_url'])?$key['midasi_url']:"no_image.png");?>">
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
