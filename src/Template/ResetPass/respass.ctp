<?= $this->Html->css('/private/css/kota/resetpass.css') ?>
<body onload="document.F.submit();">
<form METHOD="POST" target="form1" name="F"
action="https://sh-ml.mybluemix.net/mail" >
	<input type="hidden" name="mail"
	value="<?php echo $_POST['email']?>">
	<input type="hidden" name="CHANId" value="123456789">
	<input type="hidden" onclick="document.F.submit();"></input>
	<input type="submit"  >
</form>
<!--
<input type="hidden" onload="document.F.submit();">-->
<iframe name="form1" src="https://sh-ml.mybluemix.net/mail"
	width="900" height="600" style="border:none;"></iframe>
</body>
