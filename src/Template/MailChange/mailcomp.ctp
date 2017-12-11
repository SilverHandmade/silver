<?= $this->Html->css('/private/css/kota/resetpass.css') ?>
<?php if($sa == 1){?>
	<p>メールの変更が完了しました。</p>
	<span style="border-bottom: solid 1px;">
		<a href="<?= $this->Url->build(["controller" => "TopPage","action" => "index"]);?>">
			トップへ
		</a>
	</span>
<?php }else {?>
	<body onload="document.F.submit();">
		<form METHOD="POST"  name="F" action="<?= $this->Url->build(["controller" => "MailChange","action" => "index"]);?>">
			<input type="hidden" name="flg" value="2">
		</form>
	</body>
<?php }?>
