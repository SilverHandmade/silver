<li>
	<?= $this->Html->link("パスワード変更" ,['controller' => 'resetPass', "action" => 'index']);?>
</li>
<li>
	<?= $this->Html->link($user['tranceName'] ,['controller' => 'login', "action" => $user['action']]);?>
</li>
