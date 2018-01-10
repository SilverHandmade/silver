<?= //$this->Html->css('/private/css/resetpass/resetpass.css');
	$this->start('script');
	echo $this->Html->script('/private/js/resetpass/resetpass.js');
	$this->end();
	$this->start('css');
	echo $this->Html->css('/private/css/resetpass/resetpass.css');
	$this->end();
?>

<div id="form">
	<p class="form-title">パスワード変更</p>
	<form action="" id="regform" method="post">
		<p class="font-color">現在のパスワード</p>
		<p class="password">
			<input type="password" name="oldpassword" value="" class="form-control">
		</p>
		<p class="font-color">新しいパスワード</p>
		<p class="password">
			<input type="password" id="regP" name="password" value="" class="form-control">
		</p>
		<p class="password">
			<input type="password" id="regRP" name="repassword" value="" class="form-control" placeholder="再入力">
		</p>
		<p class="submit">
			<button type="submit" id="transmit" name="reset" class="submit btn btn-primary">変更</button><br>
		</p>
	</form>
</div>
<p align="center">数字・小文字・大文字のうち2種類以上で、6～20文字のパスワードを設定してください。</p>
