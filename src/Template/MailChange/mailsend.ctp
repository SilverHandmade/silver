<?= $this->Html->css('/private/css/resetpass/resetpass.css') ?>
<body onload="document.F.submit();">
<form METHOD="POST"  name="F" action="<?= $link; ?>" target="<?= $target ?>">
	<?php if(isset($e_flg)){
		echo $e_flg;
	}?>
	<input type="hidden" name="mail" value="<?= $_POST['new_email']?>">
	<input type="hidden" name="uu" value="<?= $a;?>">
</form>
<p>メールアドレス変更のメールを送信しました。<br>
数分待っても届かない場合は
<a name="" href="<?= $this->Url->build(["controller" => "mailchange","action" => "index"])?>">
<span style="border-bottom: solid 1px;">こちら</span></a></p>

<iframe name="form1" src="https://sh-ml.mybluemix.net/change"
	width="400" height="100" style="border:none;"></iframe>
</body>
