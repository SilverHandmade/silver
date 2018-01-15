<?php $this->start('title'); ?>
管理者 ユーザ登録-
<?php $this->end(); ?>
<?php $this->start('script');?>
	<?= $this->Html->script('/private/js/regist/regist.js');?>
<?php $this->end();?>
<?php $this->start('css');?>
	<?= $this->Html->css('/private/css/regist/regist.css');?>
<?php $this->end();?>

<div class="col-md-offset-2 col-md-8 center" id="form">
	<p class="form-title">新規登録</p>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<form action="<?= $this->Url->build(["controller" => "manager","action" => "user_confirm"])?>" id="regform" method="post">
				<div class="username">
					<p class="font-color">
						<span class="required">
							必須
						</span>
						氏名
					</p>
					<input type="text" id="username" name="name" value="" required class="form-control">
				</div>
				<div class="furigana">
					<p class="font-color">
						<span class="required">
							必須
						</span>
						フリガナ
					</p>
					<input type="text" id="hurigana" name="hurigana" value=""required class="form-control">
				</div>
				<div class="radio-layout">
					<?php foreach ($fClassArray as $key => $value): ?>
						<span>
							<input type="radio" name="fClassId" class="radio" value="<?= $value['id'] ?>" <?= $key==0?'checked':'';?> id="radio-<?= $value['id'] ?>">
							<label for="radio-<?= $value['id'] ?>"><?= $value['name'] ?></label>
						</span>
					<?php endforeach; ?>
				</div>
				<div class="pulldown facilityname">
					<p class="font-color">
						<span class="required">
							必須
						</span>
						施設名
					</p>
					<div id="result">
						<?= $this->element('Regist/facilities') ?>
					</div>
				</div>
				<div class="mailadress">
					<p class="font-color">
						<span class="required">
							必須
						</span>
						メールアドレス
					</p>
					<input type="email" id="regM" name="email" value="" required class="form-control">
					<div class="icon"><span></span></div>
					<input type="email" id="regRM" name="reemail" placeholder="再入力" required class="form-control">
				</div>
				<div class="password">
					<p class="font-color">
						<span class="required">
							必須
						</span>
						パスワード
					</p>
					<input type="password" id="regP" name="password" value="" required class="form-control">
					<input type="password" id="regRP" name="repassword" placeholder="再入力" required class="form-control">
				</div>
				<p align="center">※数字・小文字・大文字のうち2種類以上で、6～20文字のパスワードを設定してください。</p>
				<!--送信ボタン-->
				<div class="submit">
					<button type="submit" id="transmit" value="" class="success btn btn-success">送信</button>
				</div>
			</form>
		</div>
	</div>
</div>
