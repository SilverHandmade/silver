<?= $this->Html->css('/private/css/kota/resetpass.css') ?>
<body onload="document.F.submit();">
<form METHOD="POST"  name="F"
 <?php echo $link; ?>
	<input type="hidden" name="mail"
	value="<?php echo $_POST['email']?>">
	<input type="hidden" name="CHANId" value="123456789">
	<input type="hidden" name="uu" value="<?php echo $a;?>">
</form>
<iframe name="form1" src="https://sh-ml.mybluemix.net/mail"
	width="400" height="100" style="border:none;"></iframe>
</body>
