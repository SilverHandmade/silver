<li>
	<?= $this->Html->link($user['tranceName'] ,['controller' => 'login', "action" => $user['action']]);?>
</li>
<li>
	<?= $this->Html->link("新規登録" ,['controller' => 'regist', "action" => 'index']);?>
</li>
<li>
	<?= $this->Html->link("パスワードを忘れた" ,['controller' => 'resetPass', "action" => 'index']);?>
</li>
