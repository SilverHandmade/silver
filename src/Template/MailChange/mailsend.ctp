<?= $this->Html->css('/private/css/kota/resetpass.css') ?>
<body onload="document.F.submit();">
<form METHOD="POST"  name="F"
 <?php echo $link; ?>
	<input type="hidden" name="mail"
	value="<?php echo $_POST['n_email']?>">
	<input type="hidden" name="uu" value="<?php echo $a;?>">
</form>
<iframe name="form1" src="https://sh-ml.mybluemix.net/change"
	width="400" height="100" style="border:none;"></iframe>
</body>
