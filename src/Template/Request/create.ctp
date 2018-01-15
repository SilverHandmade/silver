<?php $this->start('title'); ?>
依頼 作成-
<?php $this->end(); ?>
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
				<p class="font-p">
					<span class="required">
						必須
					</span>
					制作物タイトル
				</p>
				<input type="text" id="reqT" class="form-control" name="requestT" maxlength="40" required value=<?php if ($_SESSION['create_flg'] == 1) {
					echo $_SESSION['request']['title'];} ?>>
				<p class="font-p">
					<span class="required">
						必須
					</span>
					制作個数
					<br>※1以上999以下の数値で入力してください。
				</p>
				<div class="left">
					<input type="number" class="form-control" id="reqN" name="requestN" min="1" max="999" required value=<?php if ($_SESSION['create_flg'] == 1) {
					echo $_SESSION['request']['number'];}else{ echo 1;} ?>>
				</div>
				<p class="font-p">ワークショップID</p>
				<!-- <input type="text" id="wsID" class="form-control" name="wsID" autocomplete="on" value=<?php if ($_SESSION['create_flg'] == 1) {
					echo $_SESSION['request']['wsid'];} ?>> -->
				<input class="form-control" type="text" name="wsID" id="wsID" readonly="readonly" value=<?php if ($_SESSION['create_flg'] == 1) {
					echo $_SESSION['request']['wsid'];} ?>>
				<button class="btn btn-info" type="button" id="" data-toggle="modal" data-target="#sampleModal">
					ワークショップ選択
				</button>
				<button class="btn btn-info" type="button" id="clear">クリア</button>

				<p class="font-p">
					<span class="required">
						必須
					</span>
					締切日
				</p>
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


<!-- モーダル・ダイアログ -->
<div class="modal fade" id="sampleModal" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
				<h4 class="modal-title">ワークショップ一覧</h4>
			</div>
			<div class="modal-body">
				<?php foreach ($Products as $key): ?>
					<div class="col-md-12">
						<div class="row panel ws-man" value="<?=$key['id']?>" data-dismiss="modal">
							<a>
								<div class="row">
									<div class="col-md-3">
										<div align="center">
											<img src="<?= $this->Url->image('workshop/'.$key['midasi_url']);?>" width="500" height="325">
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
								</div>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
			</div>
		</div>
	</div>
</div>
