<?= $this->Html->css('/private/css/kota/resetpass.css') ?>
<?php if ($this->request->is('get')) { ?>
<div id="form">
	<p class="form-title">パスワード再設定</p>
	<form action="http://localhost/silver/resetpass/mailchange" method="post">
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
<?php }elseif ($this->request->is('post')) { ?>
	<div id="form">
			<p>パスワードが再設定されました</p>
	</div>
<?php }elseif ($_POST['flg'] = 1) { ?>
	<div id="form">
			<?php echo $temp; ?>
			<!-- <p>パスワードが再設定されました</p> -->
	</div>
<?php }else { ?>
	<div>
		<p>リンクが正しくありません</p>
	</div>
<?php } ?>
