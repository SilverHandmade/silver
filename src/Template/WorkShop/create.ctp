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
			<input class="form-control" type="text" name="" id="title">
		</div>
		<div class="form-group" id="plus">
			<div class="row">
				<div class="col-md-3">
					<input type="file" name="">
				</div>
				<div class="col-md-9">
					<input class="form-control" type="text">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-default" type="button" id="add">
					<span class="glyphicon glyphicon-plus-sign"></span>
				</button>
			</div>
		</div>
	</form>
</div>
