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
					<div class="div-btn">
						<input type="file" class="input-file none file">
						<div class="bottom">
							<button type="button" name="" id="upload" class="bottom">画像選択</button>
						</div>
					</div>
					<span id="fake_input_file">NOT FILE</span>
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
		<div class="row right">
			<button type="submit" name="button" class="button-submit">送信</button>
			<button type="button" name="search-back" id="back" class="button-submit">検索画面へ</button>
		</div>
	</form>
</div>
