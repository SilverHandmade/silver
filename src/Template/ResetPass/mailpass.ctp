<?php $this->start('title'); ?>
パスワード変更 パスワードリセット-
<?php $this->end(); ?>
<?= $this->Html->css('/private/css/resetpass/resetpass.css') ?>

<div>
	<form action="<?= $this->Url->build(["controller" => "resetpass","action" => "respass"])?>" method="post">
		e-mail : <input style="width:500px" type="text" name="email">
		<br>
		<button  type="submit" value="" class="btn btn-primary">パスワードリセット</button>
	</form>
</div>
