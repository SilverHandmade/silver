<?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/video/video.css') ?>
<?php $this->end() ?>
<?php $this->start('script') ?>
	<?= $this->Html->script('/private/js/video/open.js') ?>
	<?= $this->Html->script('/private/js/video/video.js') ?>
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

		<button class="btn btn-info" type="button" id="openDetails" data-toggle="modal" data-target="#detailsModal">
			詳細検索
		</button>
		<!-- モーダル -->
		<div class="modal fade" id="detailsModal" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
						<h4 class="modal-title">詳細設定</h4>
					</div>
					<div class="modal-body">
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
									<select class="form-control" name="term">
										<option value="0">指定なし</option>
										<option value="1">1日以内</option>
										<option value="7">1週間以内</option>
										<option value="30">1か月以内</option>
										<option value="180">半年以内</option>
										<option value="365">1年以内</option>
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
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
					</div>
				</div>
			</div>
		</div>

		<button class="btn btn-success" type="submit" name="button">検索</button>
		<button class="btn bbtn-default" type="button" id="ModeTogle">
			<span class="glyphicon glyphicon-th-large"></span>
			<span class="glyphicon glyphicon-th-list none"></span>
		</button>

	</form>

	<div id="videoList">
		<?php foreach ($results as $key): ?>
			<div class="row panel">
				<a href="<?= $this->Url->build(["controller" => "video","action" => "view", 'id' => $key['id']])?>">
					<div class="row">
						<div class="col-md-3">
							投稿日:<?=$key['contribution']?>
							<img src="<?= $this->Url->image(file_exists($key['movie_url'])?$key['movie_url']:"no_image.png");?>">
						</div>
						<div class="col-md-9">
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
			</div>
		<?php endforeach; ?>
	</div>

	<div id="videoPanel">
		<?php $i = 0; foreach ($results as $key): ?>
			<?php if ($i++ % 4 == 0): ?>
				<!-- <div class="row"> -->
			<?php endif; ?>
					<div class="col-md-3">
						<a href="<?= $this->Url->build(["controller" => "video","action" => "view", 'id' => $key['id']])?>">
							<div class="panel">
								<?=$key['contribution']?>
								<img src="<?= $this->Url->image(file_exists($key['movie_url'])?$key['movie_url']:"no_image.png");?>">
								<h3><?=$key['title']?></h3>
							</div>
						</a>
					</div>
			<?php if ($i % 4 == 0): ?>
				<!-- </div> -->
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
