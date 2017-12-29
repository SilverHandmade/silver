<li>
	<?= $this->Html->link("パスワード変更" ,['controller' => 'resetPass', "action" => 'index']);?>
</li>
<li>
	<?= $this->Html->link("メールアドレス変更" ,['controller' => 'MailChange', "action" => 'index']);?>
</li>
<li>
	<?= $this->Html->link($userinfo['tranceName'] ,['controller' => 'login', "action" => $userinfo['action']]);?>
</li>
