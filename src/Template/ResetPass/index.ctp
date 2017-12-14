<?= $this->Html->css('/private/css/resetpass/resetpass.css') ?>

<div id="form">
	<p class="form-title">パスワード変更</p>
	<form action="" method="post">
		<p class="font-color">現在のパスワード</p>
		<p class="password">
			<input type="password" name="oldpassword" value="">
		</p>
		<p class="font-color">新しいパスワード</p>
		<p class="password">
			<input type="password" name="password" value="">
		</p>
		<p class="password">
			<input type="password" name="repassword" value="" placeholder="再入力">
		</p>
		<p class="submit">
			<button type="submit" name="reset" class="submit btn btn-success">変更</button><br>
		</p>
	</form>
</div>
<p align="center">数字・小文字・大文字のうち2種類以上で、6～20文字のパスワードを15分以内に設定してください。</p>
