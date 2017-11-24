<?= $this->Html->css('/private/css/kota/resetpass.css') ?>

<form METHOD="POST" target="form1" name="F" actin="https://sh-ml.mybluemix.net/mail">
	<input type="hidden" name="mail">
	<input type="hidden" name="CHANId" value="123456789">
	<input type="submit" >

</form>

<!--<input type="hidden" onload="document.F.submit();">-->
<iframe name="form1" src="https://sh-ml.mybluemix.net/mail" width="900" height="600"></iframe>
