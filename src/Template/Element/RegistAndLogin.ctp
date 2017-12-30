<li>
	<?= $this->Html->link($userinfo['tranceName'] ,['controller' => 'login', "action" => $userinfo['action']]);?>
</li>
<li>
	<?= $this->Html->link("新規登録" ,['controller' => 'regist', "action" => 'index']);?>
</li>
<li>
	<?= $this->Html->link("パスワードを忘れた" ,['controller' => 'resetPass', "action" => 'mailpass']);?>
</li>
