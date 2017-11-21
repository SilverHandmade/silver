<?php $this->start('css'); ?>
	<?= $this->Html->css('/private/css/kota/workshop.css') ?>
<?php $this->end(); ?>
<?php $this->start('script'); ?>
	<?= $this->Html->script('/private/js/kota/workshop.js') ?>
<?php $this->end(); ?>

<div class="col-md-offset-1 col-md-10">
	<form action="" method="post">
		<div class="form-group">
			<label for="title">タイトル</label>
			<input class="form-control" type="text" name="name" id="title">
		</div>
		<div class="form-group" id="plus" name="plus">
			<div class="row">
				<div class="col-md-3">
					<input type="file" name="Upload" id="file_upload">
				</div>
				<div class="col-md-9">
					<input class="form-control" type="text" name="text" id="Stext">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-default" type="button" id="add">
					<span class="glyphicon glyphicon-plus-sign" name="add"></span>
				</button>
			</div>
		</div>
		<div class="row">
			<button type="submit" name="button" id="Trans">送信</button>
			<button type="button" name="search-back" id="back">検索画面へ</button>
		</div>
	</form>
</div>
