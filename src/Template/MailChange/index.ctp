<?= $this->Html->css('/private/css/resetpass/resetpass.css') ?>
<?php $this->start('script') ?>
	<?= $this->Html->script('/private/js/passcheck/pass.js') ?>
<?php $this->end() ?>
<div id="form">
	<p class="form-title">メールアドレス変更</p>
	<form action="<?= $this->Url->build(["controller" => "mailchange","action" => "mailsend"])?>" method="post">
		<p class="font-color">現在のメールアドレス</p>
		<p class="">
			<?= $meado;?>
		</p>
		<br>
		<p class="font-color">変更したいメールアドレス</p>
		<p class="password">
			<input type="text" name="new_email" value="" class="form-control">
		</p>
		<br>
		<p class="submit">
			<button type="submit" name="reset" class="submit btn btn-primary">変更</button><br>
		</p>
	</form>
</div>
