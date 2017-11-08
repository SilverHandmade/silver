<?php $this->start('css'); ?>
  <?= $this->Html->css('/private/css/kota/request.css') ?>
  <?= $this->Html->css('/webroot/css/src/bootstrap.css')?>
  <?= $this->Html->css('request.css') ?>
<?php $this->end(); ?>
<div class="col-md-offset-2 col-md-8 center">
	<p class="font-title">代理人検索 </p>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<form class="" action="" method="post">
				<p class="font-p">制作物タイトル</p>
				<p>
					<input type="text" name="" value="">
				</p>
				<p class="font-p">制作個数</p>
				<p>
					<input type="text" name="" value="" size="3">
				</p>
				<p class="font-p">ワークショップID</p>
				<p>
					<input type="text" name="" value="" size="3">
				</p>
				<p class="font-p">締切日</p>
				<p>
					<input type="date" name="" value="">
				</p>
				<p class="button">
					<button type="submit" name="button">次へ</button>
				</p>
			</form>
		</div>
	</div>
</div>
