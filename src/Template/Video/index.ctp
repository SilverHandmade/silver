<?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/video/video.css') ?>
<?php $this->end() ?>
<?php $this->start('script') ?>
	<?= $this->Html->script('/private/js/video/open.js') ?>
<?php $this->end() ?>

<form action="" method="post">
	<table class="table table-bordered">
		<tr>
			<td>
				<label for="titel">タイトル</label>
			</td>
			<td colspan="3">
				<input class="form-control" type="text" name="titel" id="titel" placeholder="タイトル"/>
			</td>
		</tr>
	</table>
	<button class="btn btn-default" type="button" id="openDetails">詳細検索<span class="glyphicon glyphicon-chevron-down"></span></button>

	<table class="table table-bordered" id="details">
		<tr>
			<td class="col-md-2">
				<label for="videoId">動画ID</label>
			</td>
			<td class="col-md-4">
				<input class="form-control" type="text" name="videoId" id="videoId" placeholder="動画id"/>
			</td>
			<td class="col-md-2">
				<label for="update">投稿日</label>

			</td>
			<td class="col-md-4">
				<input class="form-control" type="date" name="update" id="update"/>
			</td>
		</tr>
		<tr>
			<td>
				<label for="uploader">投稿者</label>
			</td>
			<td colspan="3">
				<input class="form-control" type="text" name="uploader" id="uploader" placeholder="投稿者"/>
			</td>
		</tr>
		<tr>
			<td>
				<label for="kyeWord">キーワード</label>
			</td>
			<td colspan="3">
				<input class="form-control" type="text" name="kyeWord" id="kyeWord" placeholder="キーワード"/>
			</td>
		</tr>
	</table>
</form>
