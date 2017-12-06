<?= $this->Html->css('/private/css/kota/resetpass.css') ?>
<div id="form">
	<p class="form-title">パスワード再設定</p>
	<form action="http://localhost/silver/resetpass/mailchange?uu=<?php echo $_GET['uu'];?>" method="POST">
		<p class="font-color">パスワード</p>
		<p class="password">
			<input type="password" name="password" value="">
		</p>
		<p class="password">
			<input type="password" name="repassword" value="" placeholder="再入力">
		</p>
		<p class="submit">
			<button type="submit" name="reset" class="submit">変更</button><br>
		</p>
		<input type="hidden" name="id" value="<?php echo $b;?>">
		<input type="hidden" name="uu" value="<?php echo $_GET['uu'];?>">
	</form>
</div>
<p align="center">数字・小文字・大文字のうち2種類以上で、6～20文字のパスワードを設定してください。</p>
