<?= $this->Html->css('/private/css/kota/resetpass.css') ?>

<div>
<!--<form action="https://sh-ml.mybluemix.net/mail" method="post">-->
<form action="https://sh-ml.mybluemix.net/mail" method="post" TARGET="frame1">
e-mail : <input style="width:500px" type="text" name="mail">
<input type="hidden" name="texter"
value="こんにちは"</input>
<br>
<input  type="submit" value="パスワードリセット"></input>
<br><br>
<input type="text" value=<?php echo $_POST['CHANId']?>></input>

</form>
<iframe src="https://sh-ml.mybluemix.net/mail" NAME="frame1"></iframe>

</div>
