<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?= $this->request->getAttribute("webroot")?>css/cake_flash.css" />

	<link rel="stylesheet" href="<?= $this->request->getAttribute("webroot")?>private/css/overwrite.css" />
	<link rel="stylesheet" href="<?= $this->request->getAttribute("webroot")?>private/css/default.css" />
	<link rel="stylesheet" href="<?= $this->request->getAttribute("webroot")?>private/css/check_radio.css" />

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="<?= $this->request->getAttribute("webroot")?>private/js/index.js"></script>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
	<nav class="navbar navbar navbar-fixed-top" id="navbar">
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="navbar-header  navbar-left">
					<h1>SilverHandmade</h1>
					<a class="navbar-brand" href="<?= $this->request->getAttribute("webroot")?>">
						<img src="<?= $this->request->getAttribute("webroot")?>img/logo.png" class="nabvar-img">
					</a>
				</div>
				<div class="navbar-collapse collapse">
					<div class="nav navbar-nav navbar-right" id="welcome-user">
						<li class="dropdown navbar-buttton">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" style="font-weight: 500">
								ようこそ、<?= $user['name']; ?>さん
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<?php if($user['loginFlg']):?>
									<?= $this->element('Logout');?>
								<?php else: ?>
									<?= $this->element('RegistAndLogin');?>
								<?php endif; ?>
							</ul>
						</li>
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="menubar">
			<div class="pc">
				<div class="col-md-offset-1 col-md-10">
					<ul class="center">
						<li><?= $this->Html->link("依頼",['controller' => 'Request', "action" => "index"]);?></li>
						<li><?= $this->Html->link("ワークショップ",['controller' => 'WorkShop', "action" => "index"]);?></li>
						<li><?= $this->Html->link("動画",['controller' => 'Video', "action" => "index"]);?></li>
						<li><?= $this->Html->link("知恵袋",['controller' => 'answers', "action" => "index"]);?></li>
					</ul>
				</div>
			</div>
			<div class="mob">
				<button class="btn btn-hm glyphicon glyphicon-menu-hamburger" id="list"></button>
				<div id="menu">
					<button class="btn btn-hm glyphicon glyphicon-remove" id="cross"></button>
					<div class="col-md-offset-1 col-md-10">
						<ul class="center">
							<li><?= $this->Html->link("依頼",['controller' => 'request', "action" => "index"]);?></li>
							<li><?= $this->Html->link("ワークショップ",['controller' => 'WorkShop', "action" => "index"]);?></li>
							<li><?= $this->Html->link("動画",['controller' => 'video', "action" => "index"]);?></li>
							<li><?= $this->Html->link("知恵袋",['controller' => 'answers', "action" => "index"]);?></li>
							<?php if($user['loginFlg']):?>
								<?= $this->element('Logout');?>
							<?php else: ?>
								<?= $this->element('RegistAndLogin');?>
							<?php endif; ?>
						</ul>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div class="container-fluid" id="all">
		<div class="row">
			<!-- サイドカラム -->
			<div class="col-md-1" id="side">
			</div>

			<!-- メインカラム -->
			<div class="col-md-10" id="col-main">
				<div class="row">
					<?= $this->Flash->render() ?>
					<?= $this->fetch('content') ?>
					<div id="footer">
			            <?= $this->Html->link(__('Topへ'), ['controller' => 'TopPage', 'action' => 'index'], ['class' => 'btn btn-primary']) ?>
			        </div>
				</div>
			</div>

		</div>
	</div>

	<!-- フッター -->
	<footer class="container-fluid">
		<div class="row">
			<div class="center">
				Copyright &copy; 2017 Taguchi Corporation All rights reserved.br
				　ご意見・ご質問は<?= $this->Html->link("こちら",['controller' => 'mail', "action" => "index"], ['class' => 'btn btn-link']);?>から
			</div>
		</div>
	</footer>

</body>
</html>
