<?php $this->start('css'); ?>
	<?= $this->Html->css('/private/css/workshop/workshop.css') ?>
<?php $this->end(); ?>
<?php $this->start('script'); ?>
	<?= $this->Html->script('/private/js/workshop/workshop.js') ?>
<?php $this->end(); ?>


<div class="col-md-offset-1 col-md-10">
	<div id="title">
		<h2>ワークショップ作成画面</h2>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<input class="form-control" type="text" name="name" id="title" placeholder="タイトル">
		</div>
		<div class="form-group" id="plus" name="plus">
			<div class="row">
				<div class="col-md-9">
					<input class="form-control" type="text" name="text" id="Stext" placeholder="手順説明">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-info" type="button" id="add">
				<span class="glyphicon glyphicon-plus-sign" name="add"></span>
					画像を追加
				</button>
			</div>
		</div>
		<div class="row right btn-margin">
			<button type="submit" class="btn btn-success" id="Trans" onfocus="this.blur();">送信</button>
			<!-- <button type="button" name="search-back" id="back" class="btn btn-primary" onfocus="this.blur();">検索画面へ</button> -->
			<?= $this->Html->link('検索画面へ', ['controller' => 'workshop', 'action' => 'index'], ['class' => 'btn btn-primary'])?>
		</div>
	</form>
</div>
