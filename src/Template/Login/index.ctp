<?php $this->start('title'); ?>
ログイン-
<?php $this->end(); ?>
<?php $this->start('css'); ?>
<?= $this->Html->css('/private/css/login/login.css') ?>
<?= $this->Html->css('/webroot/css/src/bootstrap.css')?>
<?= $this->Html->css('login.css') ?>
<?php $this->end(); ?>


<div id="form">
	<p class="form-title">ログイン</p>
	<form action="" method="post">
		<p class="font-color">メールアドレス</p>
		<p class="userid">
			<input type="text" name="email" value="">
		</p>
		<p class="font-color">パスワード</p>
		<p class="password">
			<input type="password" name="password" value="">
		</p>
		<p class="submit">
			<button type="submit" name="login" class="btn btn-success">ログイン</button><br>
		</p>
		<p>
			<?= $this->Html->link("パスワードを忘れた場合はこちら" ,['controller' => 'resetPass', "action" => 'mailpass']);?>
		</p>
	</form>
</div>
