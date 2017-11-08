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
	<?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') ?>
	<?= $this->Html->css('flat-ui.min.css') ?>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<?= $this->Html->css('cake_flash.css') ?>

	<!-- 自作CSS -->
	<?= $this->Html->css('/private/css/overwrite.css') ?>
	<?= $this->Html->css('/private/css/default.css') ?>

	<?= $this->fetch('css') ?>

	<!-- js -->
	<?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') ?>
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
				<a class="navbar-brand" href="/silver">
					<img src="<?= $this->request->getAttribute("webroot") ?>img/logo.png" class="nabvar-img">
				</a>
			</div>
			<div class="navbar-collapse collapse">
				<div class="nav navbar-nav navbar-right" id="welcome-user">
					<li class="dropdown navbar-buttton">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" style="font-weight: 500">
							<!-- <img src="" class="dropdown-img"> -->
							ようこそ、<?= $username; ?>さん
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?= $url; ?>">
								<?= $tranceName; ?>
							</a></li>
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
					<li><a href="">依頼</a></li>
					<li><a href="">ワークショップ</a></li>
					<li><a href="">動画</a></li>
					<!-- <li><a href="">知恵袋</a></li> -->
				</ul>
			</div>
		</div>
		<div class="mob">
			<button class="btn btn-hm fui-list" id="list"></button>
			<div id="menu">
				<button class="btn btn-hm fui-cross" id="cross"></button>
				<div class="col-md-offset-1 col-md-10">
					<ul class="center">
						<li><a href="">依頼</a></li>
						<li><a href="">ワークショップ</a></li>
						<li><a href="">動画</a></li>
						<!-- <li><a href="">知恵袋</a></li> -->>
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
			<div class="row">
				<?= $this->fetch('content') ?>
			</div>
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
			　ご意見・ご質問は<a class="btn btn-link" href="/silver/mail">こちら</a>から
		</div>
	</div>
</footer>

</body>
</html>
