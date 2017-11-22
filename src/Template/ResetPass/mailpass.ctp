<?= $this->Html->css('/private/css/kota/resetpass.css') ?>

<div>
<!--<form action="https://sh-ml.mybluemix.net/mail" method="post">-->
<form action="http://localhost/silver/resetpass/respass" method="post">
e-mail : <input style="width:500px" type="text" name="mail">
<input type="hidden" name="texter"
value="こんにちは"</input>
<br>
<input  type="submit" value="パスワードリセット"></input>
<br><br>
<input type="text" value=<?php echo $a ?>></input>

</form>
<!--<iframe src="https://sh-ml.mybluemix.net/mail" NAME="frame1"
	width="500px" style="border:none;">
</iframe>-->

</div>
