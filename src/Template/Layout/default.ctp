<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $this->fetch('title')?></title>

	<?= $this->Html->meta('icon') ?>

	<?= $this->fetch('meta') ?>


	<?= $this->Html->css('cake_flash.css') ?>
	<?= $this->Html->css('flat-ui.css') ?>
	<?= $this->Html->css('bootstrap.css') ?>

	<!-- 自作CSS -->
	<?= $this->Html->css('/private/css/default.css') ?>
	<?= $this->Html->css('/private/css/overwrite.css') ?>

	<?= $this->fetch('css') ?>

	<?= $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js') ?>
	<?= $this->Html->script('flat-ui.min.js') ?>
	<?= $this->Html->script('application.js') ?>
	<?= $this->Html->script('prettify.js') ?>

	<!-- 自作JS -->
	<?= $this->fetch('script') ?>
	<?= $this->Html->script('/private/js/move_top.js') ?>

</head>
<body>
<nav class="navbar navbar navbar-fixed-top" id="navbar">
	<div class="row">
		<div class="col-xs-12">
			<div class="navbar-header  navbar-left">
				<a class="navbar-brand" href="/SilverHandmade">
					<img src="<?= $this->request->getAttribute("webroot") ?>img/logo.png" class="nabvar-img">
				</a>
			</div>
			<div class="navbar-collapse collapse">
				<div class="nav navbar-nav navbar-right" id="welcome-user">
					<li class="dropdown navbar-buttton">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" style="font-weight: 500">
							<img src="" class="dropdown-img">
							ようこそ、nameさん
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="/apcom/logout">ログアウト</a></li>
						</ul>
					</li>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="menubar">
			<ul class="center">
				<li><a href="">依頼</a></li>
				<li><a href="">ワークショップ</a></li>
				<li><a href="">動画</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container-fluid" id="all">
	<div class="row">
		<!-- サイドカラム -->
		<div class="col-xs-2" id="sidebar">
			<div class="row">
				<ul>
					<li class="success" onclick="location.reload();"><a>更新</a></li>
					<li><a href="">依頼</a></li>
					<li><a href="">ワークショップ</a></li>
					<li><a href="">動画</a></li>
					<?= $this->fetch('sidebar')?>
					<li class="danger"><a href="/silver/logout">ログアウト</a></li>
				</ul>
			</div>
		</div>

		<!-- メインカラム -->
		<div class="col-xs-offset-2 col-xs-8" id="col-main">
			<?= $this->Flash->render() ?>
			<?= $this->fetch('content') ?>
		</div>

		<!-- 右サイドカラム -->
		<div class="col-xs-2">
			<p id="page-top"><a href="#wrap">PAGE TOP</a></p>
		</div>
	</div>
</div>

<!-- フッター -->
<footer class="container-fluid">
	<div class="row">
		<div class="center">
			Copyright &copy; 2017 Taguchi Corporation All rights reserved.
		</div>
	</div>
</footer>

</body>
</html>
