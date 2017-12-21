<li><?= $this->Html->link("依頼",['controller' => 'request', "action" => "index"]);?></li>
<li><?= $this->Html->link("ワークショップ",['controller' => 'WorkShop', "action" => "index"]);?></li>
<li><?= $this->Html->link("動画",['controller' => 'video', "action" => "index"]);?></li>
<li><?= $this->Html->link("知恵袋",['controller' => 'answers', "action" => "index"]);?></li>
<?php if ($this->request->session()->read('Auth.User.facility_classes_id') == 9): ?>
	<li><?= $this->Html->link("管理画面",['controller' => 'manager', "action" => "index"]);?></li>
<?php endif; ?>
