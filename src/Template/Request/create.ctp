<?php $this->start('css'); ?>
	<?= $this->Html->css('/private/css/kota/create.css') ?>
<?php $this->end(); ?>


<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();
?>

<?php

 ?>

<div class="col-md-offset-2 col-md-8 center">

	<p class="font-title">依頼作成</p>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<form action="/silver/request/proof" method="post">



				<p class="font-p">制作物タイトル</p>
				<input type="text" id="reqT" name="requestT" maxlength="40" required value=<?php if ($_SESSION['create_flg'] == 1) {
					echo $_SESSION['request']['title'];} ?> >
				<p class="font-p">制作個数</p>
				<div class="left">
					<input type="number" id="reqN" name="requestN" min="1" max="999" required value=<?php if ($_SESSION['create_flg'] == 1) {
						echo $_SESSION['request']['number'];}else{ echo 1;} ?>>
				</div>
				<p class="font-p">ワークショップID</p>
				<input type="text" id="wsID" name="wsID" autocomplete="on" value=<?php if ($_SESSION['create_flg'] == 1) {
					echo $_SESSION['request']['wsid'];} ?>>
				<p class="font-p">締切日</p>
				<input type="date" id="reqD" name="requestD" required value=<?php if ($_SESSION['create_flg'] == 1) {
					echo $_SESSION['request']['date'];}else{?>
						"setDate();"
				<?php } ?>>
				<div class="right">
					<button type="submit" class="button" name="createReq" onclick="return nextpage();">次へ</button>
					<button type="button" class="button" onclick="location.href='/silver/request'">戻る</button>

				</div>
			</form>
		</div>
	</div>
</div>
