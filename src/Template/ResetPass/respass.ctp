<?php $this->start('title'); ?>
パスワード変更 メール送信-
<?php $this->end(); ?>
<?= $this->Html->css('/private/css/resetpass/resetpass.css') ?>
<body onload="<?= $body_flg?>">
	<form METHOD="POST"  name="F" action="<?= $link; ?>" target="<?= $target ?>">
		<?php if(isset($e_flg)){
			echo $e_flg;
		}else {?>
			<input type="hidden" name="uu" value="<?php echo $a;?>">
			<input type="hidden" name="ip" value="<?= $ip;?>">
		<?php }?>
		<input type="hidden" name="mail"
		value="<?php echo $_POST['email']?>">
	</form>
	<p>パスワードリセットのメールを送信しました。<br>
		数分待っても届かない場合は
		<a name="" href="<?= $this->Url->build(["controller" => "resetpass","action" => "mailpass"])?>">
			<span style="border-bottom: solid 1px;">こちら</span>
		</a>
	</p>
	<iframe name="form1" src="https://sh-ml.mybluemix.net/mail"
		width="1" height="1" style="border:none;">
	</iframe>
</body>
