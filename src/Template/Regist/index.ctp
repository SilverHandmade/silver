
<?php
	$this->start('script');
	echo $this->Html->script('/private/js/regist/regist.js');
	$this->end();




?>
<!-- -->
<form id="regform" name="" action="confirm" method="post">
		<div class="">
			<!-- $postname-->
			氏名:<input type="text" id="username" name="name" value="" required>
		</div>

		<div class="">
			<!-- $posthurigana-->
			フリガナ:<input type="text" id="hurigana" name="hurigana" value="" required>
		</div>

		<div class="">

			<?php foreach ($fClassArray as $key =>$value)
				{ ?>

					<input type="radio" name="fClassId" value="<?= $value['id'] ?>" <?php if ($key == 0){
						?>checked<?php
					} ?>><?= $value['name'] ?>
					<?php

				}
				?>
		</div>

	<div class="pulldown">
			<!-- $postfacilitie-->
			施設名: <select name="facilities">
				<?php foreach ($results as $value)
					{ ?>
						<option value="<?= $value['id'] ?> "><?= $value['name'] ?></option>
					<?php
					}
					?>
			</select>
		</div>

		<div class="">
			<!-- $postmail-->
			メールアドレス:<input type="email" id="regM" name="email" value=""required>
		</div>

		<div class="">
			<!-- $postremail-->
			再入力:<input type="email" id="regRM" name="reemail"required>
		</div>

		<div class="">
			<!-- $postpass-->
			パスワード:<input type="password" id="regP" name="password" value=""required>
		</div>

		<div class="">
			<!-- $postrepass-->
			再入力:<input type="password" id="regRP" name="repassword"required>
		</div>

		<!-- -->
		<button type="submit" value="" id="regbtn">送信</button>

		</form>
