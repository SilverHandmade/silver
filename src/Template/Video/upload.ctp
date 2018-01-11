<?php $this->start('css'); ?>
	<?= $this->Html->css('/private/css/workshop/workshop.css') ?>
<?php $this->end(); ?>
<?php $this->start('script'); ?>
	<?= $this->Html->script('/private/js/workshop/workshop.js') ?>
<?php $this->end(); ?>

<div class="col-md-offset-1 col-md-10">
	<form action="" method="post" enctype="multipart/form-data" >
		<div class="form-group">
			<label for="title">タイトル</label>
			<input class="form-control" type="text" name="name" id="title">
		</div>
		<div class="form-group" id="plus" name="plus">
			<div class="row">
				<div class="col-md-3">
					<div class="div-btn">
						<input type="file" class="input-file none file" name="upload_gazo" id="G_upload"  accept="video/*"/>
						<div class="button">
							<button type="button" name="upload" id="G_upload" class="btn btn-info">動画選択</button>
						</div>
					</div>
					<span id="fake_input_file" class="margin-left span">NOT FILE</span>
				</div>

				<div class="col-md-9">
					<input class="form-control" type="text" name="text" id="Stext">
				</div>
			</div>
		</div>

		<div class="row right btn-margin">
			<button type="submit" name="button" class="btn btn-success" id="Trans" onfocus="this.blur();">送信</button>
			<button type="button" name="search-back" id="back" class="btn btn-primary" onfocus="this.blur();">検索画面へ</button>
		</div>
	</form>
</div>
