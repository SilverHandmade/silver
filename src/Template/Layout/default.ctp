<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->fetch('title')?></title>

	<?= $this->Html->meta('icon') ?>

	<?= $this->fetch('meta') ?>

	<?= $this->Html->css('flat-ui.css') ?>
	<?= $this->Html->css('bootstrap.min.css') ?>

	<!-- 自作CSS -->
	<?= $this->Html->css('/private/css/default.css') ?>
	<?= $this->Html->css('/private/css/flat_overwrite.css') ?>

	<?= $this->fetch('css') ?>

	<?= $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js') ?>
	<?= $this->Html->script('flat-ui.min.js') ?>
	<?= $this->Html->script('application.js') ?>
	<?= $this->Html->script('prettify.js') ?>

	<!-- 自作JS -->

	<?= $this->fetch('script') ?>

</head>
<body>
<nav class=" navbar navbar-inverse navbar-fixed-top" id="navbar">
    <div class="col-xs-offset-2 col-xs-8 ">
        <div class="navbar-header  navbar-left">
            <a class="navbar-brand" href="/SilverHandmade">
                <img src="<?= $this->request->getAttribute("webroot") ?>img/logo.png" class="nabvar-img">
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <div class="nav navbar-nav navbar-right" id="welcome-user">
                <li class="dropdown navbar-buttton ">
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
</nav>

<div class="all">
    <div id="activity-div" >
        <div class="col-xs-offset-2 col-xs-8" id="activity-text" > </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- サイドカラム -->
            <button class="btn btn-hm fui-list floating" id="list"></button>
            <div class="col-xs-2 floating" id="sidebar">
                <!-- <div class="row">
                    <button class="btn btn-hm fui-cross" id="cross"></button>
                </div> -->
                <div class="row">
                    <table class="table table-hover">
						<?= $this->fetch('sidebar')?>
                        <tr class="danger"><td><a href="/apcom/logout">ログアウト</a></td></tr>
                    </table>
                </div>
            </div>

            <!-- メインカラム -->
            <div class="col-xs-8 col-xs-offset-2" id="col-main">
				<?= $this->fetch('content') ?>
            </div>
            <!-- 右サイドカラム -->
            <div class="col-xs-offset-1 col-xs-1">
                <div class="row floating">
                    <div class="" id="reloadbutton">
                        <button class="btn btn-success" onclick="location.reload();">更新</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
