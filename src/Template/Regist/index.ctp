<?php
	$this->start('script');
	echo $this->Html->script('/private/js/regist/regist.js');
	$this->end();
	$this->start('css');
	echo $this->Html->css('/private/css/regist/regist.css');
	$this->end();
?>
<!-- -->
<div class="col-md-offset-2 col-md-8 center" id="form">
	<p class="form-title">新規登録</p>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<form action="<?= $this->Url->build(["controller" => "regist","action" => "confirm"])?>" id="regform" method="post">

				<div class="username">
					<!-- $postname-->
					<p class="font-color">氏名</p>
					<input type="text" id="username" name="name" value="" required class="form-control">
				</div>
				<div class="furigana">
					<!-- $posthurigana-->
					<p class="font-color">フリガナ</p>
					<input type="text" id="hurigana" name="hurigana" value=""required class="form-control">
				</div>
				<div class="radio-layout">
					<?php foreach ($fClassArray as $key => $value): ?>
						<span>
							<?php if ($fClassArray[$key]['id'] == 1) {?>
								<input type="radio" onclick="hihyoji()" name="fClassId" class="radio" value="<?= $value['id'] ?>" <?= $key==0?'checked':'';?> id="radio-<?= $value['id'] ?>">
								<label for="radio-<?= $value['id'] ?>"><?= $value['name'] ?></label>
							<?php }else {?>
								<input type="radio" onclick="hyoji()" name="fClassId" class="radio" value="<?= $value['id'] ?>" <?= $key==0?'checked':'';?> id="radio-<?= $value['id'] ?>">
								<label for="radio-<?= $value['id'] ?>"><?= $value['name'] ?></label>
							<?php } ?>


						</span>
					<?php endforeach; ?>
				</div>
				<div class="pulldown facilityname">
					<!-- $postfacilitie-->
					<p class="font-color">施設名</p>
					<select name="facilities">
						<?php foreach ($results as $key => $value): ?>
								<option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="mailadress">
					<!-- $postmail-->
					<p class="font-color">メールアドレス</p>
					<input type="email" id="regM" name="email" value="" required class="form-control">
					<!-- $postremail-->
					<input type="email" id="regRM" name="reemail" placeholder="再入力" required class="form-control">
				</div>
				<div class="password">
					<!-- $postpass-->
					<p class="font-color">パスワード</p>
					<input type="password" id="regP" name="password" value="" required class="form-control">
					<!-- $postrepass-->
					<input type="password" id="regRP" name="repassword" placeholder="再入力" required class="form-control">
				</div>
				<!--送信ボタン-->
				<div class="submit">
					<button type="submit" id="transmit" value="" class="success btn btn-success">送信</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="message">こんにちは</div>

<script>
function hyoji() {
    document.getElementById("message").style.display="block";
}

function hihyoji() {
    document.getElementById("message").style.display="none";
}
</script>
