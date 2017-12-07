<?= $this->Html->css('/private/css/kota/resetpass.css') ?>
<div id="form">
	<p class="form-title">メールアドレス変更</p>
	<form action="<?= $this->Url->build(["controller" => "mailchange","action" => "mailsend"])?>" method="post">
		<p class="font-color">現在のメールアドレス</p>
		<p class="">
			<?php echo $meado;?>
		</p>
		<br>
		<p class="font-color">変更したいメールアドレス</p>
		<p class="password">
			<input type="text" name="n_email" value="">
		</p>
		<br>
		<p class="submit">
			<button type="submit" name="reset" class="submit">変更</button><br>
		</p>
	</form>





</div>
