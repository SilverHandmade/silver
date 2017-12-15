<script>
var test = <?php echo $results; ?>;
</script>

<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();

	$this->start('css');
		echo $this->Html->css('/private/css/request/request.css');
	$this->end();
?>

<div class="col-md-offset-2 col-md-8 center">
	<h2>依頼作成</h2>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<form action=<?= $this->Url->build(["controller" => "Request","action" => "proof"])?> method="post">
				<p class="font-p">制作物タイトル</p>
				<input type="text" id="reqT" class="form-control" name="requestT" maxlength="40" required value=<?php if ($_SESSION['create_flg'] == 1) {
					echo $_SESSION['request']['title'];} ?>>
				<p class="font-p">制作個数</p>
				<div class="left">
					<input type="number" class="form-control" id="reqN" name="requestN" min="1" max="999" required value=<?php if ($_SESSION['create_flg'] == 1) {
					echo $_SESSION['request']['number'];}else{ echo 1;} ?>>
				</div>
				<p class="font-p">ワークショップID</p>
				<input type="text" id="wsID" class="form-control" name="wsID" autocomplete="on" value=<?php if ($_SESSION['create_flg'] == 1) {
					echo $_SESSION['request']['wsid'];} ?>>
				<p class="font-p">締切日</p>
				<input type="date" id="reqD" class="form-control" name="requestD" required value=<?php if ($_SESSION['create_flg'] == 1) {
					echo $_SESSION['request']['date'];}?>>

				<div class="btn-sub">
					<button type="submit" class="btn-margin btn btn-primary" name="createReq" onclick="return nextpage()">次へ</button>
					<?= $this->Html->link('戻る',["controller" => "Request","action" => "index"],['class'=>'btn btn-primary btn-margin'])?>
				</div>
			</form>
		</div>
	</div>
</div>
