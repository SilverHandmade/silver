<?= $this->Html->css('/private/css/kota/resetpass.css') ?>

<div id="form">
	<p class="form-title">パスワード再設定</p>
	<form action="" method="post">
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
	</form>
</div>
