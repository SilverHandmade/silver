<?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/video/video.css') ?>
<?php $this->end() ?>
<?php $this->start('script') ?>
	<?= $this->Html->script('/private/js/video/open.js') ?>
<?php $this->end() ?>

<div class="col-md-offset-1 col-md-10">
	<form action="" method="post">
		<table class="table table-bordered">
			<tr>
				<td>
					<label for="title">タイトル</label>
				</td>
				<td colspan="3">
					<input class="form-control" type="text" name="title" id="title" placeholder="タイトル"/>
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
					<select class="form-control">
						<option>指定なし</option>
						<option>1日以内</option>
						<option>1週間以内</option>
						<option>1か月以内</option>
						<option>1年以内</option>
					</select>
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
		<button class="btn btn-success" type="submit" name="button">検索</button>
	</form>

	<div id="videoList">
		<?php foreach ($results as $key): ?>
			<a href="<?= $this->Url->build('/video/'.$key['id'], true);?>">
				<div class="row panel">
					<div class="col-md-4">
						投稿日:<?=$key['contribution']?>
						<img src="<?= $this->Url->image(file_exists($key['movie_url'])?$key['movie_url']:"no_image.png");?>">
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<h3><?= $key['title']; ?></h3>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p>
									<?= $key['description']; ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</a>
		<?php endforeach; ?>
	</div>



</div>
