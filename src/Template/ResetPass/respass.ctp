<?= $this->Html->css('/private/css/kota/resetpass.css') ?>


<input type="hidden" onload="document.F.submit();">
<iframe name="form1" src="https://sh-ml.mybluemix.net/mail" width="500"></iframe>
<form METHOD="POST" target="form1" name="F" actin="https://sh-ml.mybluemix.net/mail">
	<input type="hidden" name="mail">
</form>
