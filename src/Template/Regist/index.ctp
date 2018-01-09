<?php
	$this->start('script');
	echo $this->Html->script('/private/js/regist/regist.js');
	$this->end();
	$this->start('css');
	echo $this->Html->css('/private/css/regist/regist.css');
	echo $this->Html->css('/private/css/loading.css');
	$this->end();
?>
<div class="col-md-offset-2 col-md-8 center" id="form">
	<p class="form-title">新規登録</p>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<form action="<?= $this->Url->build(["controller" => "regist","action" => "confirm"])?>" id="regform" method="post">
				<div class="username">
					<p class="font-color">氏名</p>
					<input type="text" id="username" name="name" value="" required class="form-control">
				</div>

				<div class="furigana">
					<p class="font-color">フリガナ</p>
					<input type="text" id="hurigana" name="hurigana" value=""required class="form-control">
				</div>

				<div class="radio-layout">
					<span>
						<input type="radio" name="fClassId" class="radio" value="<?= $user['facility_classes_id'] ?>" checked id="radio">
						<label for="radio"><?= $user['FacilityClasses']['name'] ?></label>
					</span>
				</div>

				<div class="facilityname">
					<p class="font-color">施設名</p>
					<input type="hidden" name="facilities" value="<?= $user['Facilities']['name'] ?>">
					<label id="inputStyleLabel"><?= $user['Facilities']['name'] ?></label>
				</div>

				<div class="mailadress">
					<p class="font-color">メールアドレス</p>
					<div>
						<input type="email" id="regM" name="email" value="" required class="form-control">
						<div class="icon"></div>
					</div>
					<input type="email" id="regRM" name="reemail" placeholder="再入力" required class="form-control">
				</div>

				<div class="password">
					<p class="font-color">パスワード</p>
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
