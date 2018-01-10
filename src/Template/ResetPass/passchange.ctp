<?= //$this->Html->css('/private/css/resetpass/resetpass.css');
	$this->start('script');
	echo $this->Html->script('/private/js/resetpass/resetpass.js');
	$this->end();
	$this->start('css');
	echo $this->Html->css('/private/css/resetpass/resetpass.css');
	$this->end();
?>
<?php if($sa == 1){?>
<div id="form">
	<p class="form-title">パスワード再設定</p>
	<form action="<?= $this->Url->build(["controller" => "resetpass","action" => "passchange","uu" => $_GET['uu']])?>" method="POST">
		<p class="font-color">パスワード</p>
		<p class="password">
			<input type="password" id="regP" name="password" value="">
		</p>
		<p class="password">
			<input type="password" id="regRP" name="repassword" value="" placeholder="再入力">
		</p>
		<p class="submit">
			<button type="submit" id="transmit" name="reset" class="submit btn btn-success">変更</button><br>
		</p>
		<input type="hidden" name="id" value="<?= $b;?>">
		<input type="hidden" name="uu" value="<?= $_GET['uu'];?>">
	</form>
</div>
<p align="center">数字・小文字・大文字のうち2種類以上で、6～20文字のパスワードを設定してください。</p>
<?php }elseif($sa == 3) {?>
	<?= $this->Html->link('編集',["controller" => "TopPage","action" => "index")?>
<?php }elseif($sa == 2) {?>
	<body onload="document.F.submit();">
		<form METHOD="POST"  name="F" action="<?= $this->Url->build(["controller" => "resetpass","action" => "mailpass"]);?>">
			<input type="hidden" name="flg" value="2">
		</form>
	</body>
<?php }?>
