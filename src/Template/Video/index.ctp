<?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/video/video.css') ?>
<?php $this->end() ?>
<?php $this->start('script') ?>
	<?= $this->Html->script('/private/js/video/video.js') ?>
<?php $this->end() ?>

<div class="col-md-offset-1 col-md-10">
	<div class="row">
		<div class="col-md-12">
			<form action="" method="post" id="conditions">
				<div class="row">
					<div class="col-md-offset-2 col-md-8">
						<div class="row" id="inputTitle">
							<div class="col-md-9">
								<input class="form-control" type="text" name="title" id="title" placeholder="タイトル"/>
							</div>
							<div class="col-md-3">
								<button class="btn btn-info" type="button" id="openDetails" data-toggle="modal" data-target="#detailsModal">
									詳細
									<span class="glyphicon glyphicon-option-vertical"></span>
								</button>
								<button class="btn btn-success" type="submit" id="serach">
									検索
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</div>
						</div>
					</div>
				</div>
				<!-- モーダル -->
				<div class="modal fade" id="detailsModal" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
								<h4 class="modal-title">詳細設定</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-12">
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
													<label for="kyeWord">説明文</label>
												</td>
												<td colspan="3">
													<input class="form-control" type="text" name="kyeWord" id="kyeWord" placeholder="説明文"/>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<button class="btn btn-info" type="button" id="ModeTogle">
				<span class="glyphicon glyphicon-th-large"></span>
				<span class="glyphicon glyphicon-th-list"></span>
			</button>
		</div>
		<div class="col-md-6 right">
			<button type="button" class="btn btn-primary right">
				アップロード
				<span class="glyphicon glyphicon-cloud-upload"></span>
			</button>

		</div>
	</div>

	<div id="result">
		<?= $this->element('videoSerchResult');?>
	</div>
</div>
