<?= $this->Html->css('/private/css/kota/resetpass.css') ?>

<div>
<form action="https://sh-ml.mybluemix.net/mail" method="post">
e-mail : <input style="width:500px" type="text" name="mail">
<input type="hidden" name="texter"
value=こんにちは></input>
<br>
<input  type="submit" value="パスワードリセット"></input>

</form>
</div>
