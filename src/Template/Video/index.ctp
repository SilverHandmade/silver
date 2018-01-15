<?php $this->start('title'); ?>
動画-
<?php $this->end(); ?>
<?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/video/video.css') ?>
	<?= $this->Html->css('/private/css/modeToggle.css') ?>
<?php $this->end() ?>
<?php $this->start('script') ?>
	<?= $this->Html->script('/private/js/modeToggle.js') ?>
	<?= $this->Html->script('/private/js/searchAjax.js') ?>
<?php $this->end() ?>

<div class="col-md-offset-1 col-md-10">
	<div class="row">
		<div class="col-md-12">
			<form action="" method="post" class="searchAjax">
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
				<?= $this->element('video/modal');?>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<a href="<?= $this->Url->build(["controller" => "video", "action" => "upload"]);?>" class="btn btn-primary">
				アップロード
				<span class="glyphicon glyphicon-cloud-upload"></span>
			</a>

		</div>
	</div>

	<div id="searchAjaxResult">
		<?= $this->element('video/videoSerchResult');?>
	</div>
</div>
