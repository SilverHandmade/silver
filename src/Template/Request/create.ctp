<?php $this->start('css'); ?>
	<?= $this->Html->css('/private/css/kota/create.css') ?>
<?php $this->end(); ?>

<script>
var test = <?php echo $results; ?>;
</script>

<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();
?>

<div class="col-md-offset-2 col-md-8 center">
	<p class="font-title">代理人検索 </p>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<form action="/silver/request" method="post">
				<p class="font-p">制作物タイトル</p>
				<input type="text" id="reqT" name="requestT" value="" maxlength="40" required>
				<p class="font-p">制作個数</p>
				<div class="left">
					<input type="number" id="reqN" name="requestN" value="1" min="1" max="999" required>
				</div>
				<p class="font-p">ワークショップID</p>
				<input type="text" id="wsID" name="wsID" value="" autocomplete="off" required>
				<p class="font-p">締切日</p>
				<input type="date" id="reqD" name="requestD" value="" autocomplete="on" required>
				<div class="right">
					<button type="submit" class="button" name="createReq" onclick="return nextpage();">次へ</button>
					<button type="button" class="button" onclick="location.href='/silver/request'">戻る</button>
				</div>
			</form>
		</div>
	</div>
</div>
