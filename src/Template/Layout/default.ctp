<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $this->fetch('title')?></title>

	<?= $this->Html->meta('icon') ?>

	<?= $this->fetch('meta') ?>

	<!-- CSS -->
	<?= $this->Html->css('https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css') ?>
	<?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') ?>
	<?= $this->Html->css('cake_flash.css') ?>

	<!-- 自作CSS -->
	<?= $this->Html->css('/private/css/overwrite.css') ?>
	<?= $this->Html->css('/private/css/default.css') ?>

	<?= $this->fetch('css') ?>

	<!-- js -->
	<?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') ?>
	<?= $this->Html->script('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js') ?>
	<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js') ?>
	<?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') ?>

	<!-- 自作JS -->
	<?= $this->Html->script('/private/js/move_top.js') ?>
	<?= $this->Html->script('/private/js/index.js') ?>

	<?= $this->fetch('script') ?>



</head>
<body>
<nav class="navbar navbar navbar-fixed-top" id="navbar">
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<div class="navbar-header  navbar-left">
				<h1>SilverHandmade</h1>
				<a class="navbar-brand" href="<?= $this->request->getAttribute("webroot") ?>">
					<img src="<?= $this->request->getAttribute("webroot") ?>img/logo.png" class="nabvar-img">
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
							<?php if($user['registFlg']):?>
								<?= $this->element('RegistAndLogin');?>
							<?php else: ?>
								<?= $this->element('Logout');?>
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
					<li><a href="https://chiebukuro.yahoo.co.jp/" target="_blank">知恵袋</a></li>
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
						<li><?= $this->Html->link("ワークショップ",['controller' => 'workshop', "action" => "index"]);?></li>
						<li><?= $this->Html->link("動画",['controller' => 'video', "action" => "index"]);?></li>
						<li><a href="https://chiebukuro.yahoo.co.jp/" target="_blank">知恵袋</a></li>
						<?php if($user['registFlg']):?>
							<?= $this->element('RegistAndLogin');?>
						<?php else: ?>
							<?= $this->element('Logout');?>
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
			</div>
			<?= $this->fetch('content') ?>
		</div>

		<!-- 右サイドカラム -->
		<div class="col-md-1" id="side">
			<p id="page-top"><a href="#wrap">PAGE TOP</a></p>
		</div>
	</div>
</div>

<!-- フッター -->
<footer class="container-fluid">
	<div class="row">
		<div class="center">
			Copyright &copy; 2017 Taguchi Corporation All rights reserved.
			　ご意見・ご質問は<a class="btn btn-link" href="<?= $this->request->getAttribute("webroot") ?>mail">こちら</a>から
		</div>
	</div>
</footer>

</body>
</html>
