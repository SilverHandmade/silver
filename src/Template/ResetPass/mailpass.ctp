<?= $this->Html->css('/private/css/kota/resetpass.css') ?>

<div>
<form action="<?= $this->Url->build(["controller" => "resetpass","action" => "respass"])?>" method="post">
<!-- <form action="http://localhost/silver/resetpass/respass" method="post"> -->
e-mail : <input style="width:500px" type="text" name="email">
<br>
<input  type="submit" value="パスワードリセット"></input>
</form>
</div>
<?php if($this->request->is('post')) {echo $err;} ?>
