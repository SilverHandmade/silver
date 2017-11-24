<?php
	$this->start('script');
	echo $this->Html->script('/private/js/regist/regist.js');
	$this->end();
	$this->start('css');
	echo $this->Html->css('/private/css/kota/regist.css');
	$this->end();
?>
<!-- -->
<div class="col-md-offset-2 col-md-8 center" id="form">
	<p class="form-title">新規登録</p>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<form action="<?= $this->Url->build(["controller" => "regist","action" => "confirm"])?>" method="post" >

				<div class="username">
					<!-- $postname-->
					<p class="font-color">氏名</p>
					<input type="text" id="username" name="name" value="">
				</div>
				<div class="furigana">
					<!-- $posthurigana-->
					<p class="font-color">フリガナ</p>
					<input type="text" id="hurigana" name="hurigana" value="">
				</div>
				<div class="checkbox">
					<?php foreach ($fClassArray as $key =>$value)
						{ ?>
							<input type="radio" name="fClassId" value="<?= $value['id'] ?>" <?php if ($key == 0){
								?>checked<?php
							} ?>><?= $value['name'] ?>
							<?php
						}
						?>
				</div>
				<div class="pulldown facilityname">
					<!-- $postfacilitie-->
					<p class="font-color">施設名</p>
					<select name="facilities">
						<?php foreach ($results as $value)
							{ ?>
								<option value="<?= $value['id'] ?> "><?= $value['name'] ?></option>
							<?php
							}
							?>
					</select>
				</div>
				<div class="mailadress">
					<!-- $postmail-->
					<p class="font-color">メールアドレス</p>
					<input type="email" id="regM" name="email" value="">
					<!-- $postremail-->
					<input type="email" id="regRM" name="reemail" placeholder="再入力">
				</div>
				<div class="password">
					<!-- $postpass-->
					<p class="font-color">パスワード</p>
					<input type="password" id="regP" name="password" value="">
					<!-- $postrepass-->
					<input type="password" id="regRP" name="repassword" placeholder="再入力">
				</div>
				<!--送信ボタン-->
				<div class="submit">
					<button type="submit" id="regform" onclick="test();"	value="" class="submit">送信</button>
				</div>
			</form>
		</div>
	</div>
</div>
