<?php $this->start('script');?>
	<?= $this->Html->script('/private/js/regist/regist.js');?>
	<?= $this->Html->script('/private/js/manager/user.js');?>
<?php $this->end();?>
<?php $this->start('css');?>
	<?= $this->Html->css('/private/css/regist/regist.css');?>
	<?= $this->Html->css('/private/css/loading.css');?>
<?php $this->end();?>

<div class="col-md-offset-2 col-md-8 center" id="form">
	<p class="form-title">新規登録</p>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<form action="" id="UChange" method="post">
				<div class="username">
					<p class="font-color">氏名</p>
					<input type="text" id="username" name="name" value="<?= $user['name'] ?>" required class="form-control">
				</div>
				<div class="furigana">
					<p class="font-color">フリガナ</p>
					<input type="text" id="hurigana" name="hurigana" value="<?= $user['hurigana']?>"required class="form-control">
				</div>
				<div class="radio-layout">
					<?php foreach ($fClassArray as $key => $value): ?>
						<span>
							<input type="radio" name="fClassId" class="radio" value="<?= $value['id'] ?>" <?= $value['id']==$user['facility_classes_id']?'checked':'';?> id="radio-<?= $value['id'] ?>">
							<label for="radio-<?= $value['id'] ?>"><?= $value['name'] ?></label>
						</span>
					<?php endforeach; ?>
				</div>
				<div class="pulldown facilityname">
					<p class="font-color">施設名</p>
					<div id="result">
						<?= $this->element('Manager/fClassResult') ?>
					</div>
				</div>
				<input type="hidden" name="Del_flg" value="<?= $user['Del_flg']?>">
				<input type="hidden" name="updateFlg" value="0" id="updateFlg">

				<!--送信ボタン-->
				<div class="submit">
					<button type="button" class="btn btn-danger udelete <?= $user['Del_flg']?'active':'';?>" data-toggle="button" autocomplete="off">
						削除
					</button>
					<button type="submit" id="transmit" value="" class="success btn btn-success">送信</button>
				</div>
			</form>
		</div>
	</div>
</div>
