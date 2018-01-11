<?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/manager/manager.css') ?>
	<?= $this->Html->css('/private/css/loading.css') ?>
<?php $this->end() ?>
<?php $this->start('script') ?>
	<?= $this->Html->script('https://ajaxzip3.github.io/ajaxzip3.js') ?>
	<?= $this->Html->script('/private/js/searchAjax.js') ?>
	<?= $this->Html->script('/private/js/manager/facility.js') ?>
<?php $this->end() ?>

<div class="col-md-offset-1 col-md-10">
	<div class="row">
		<div class="col-md-12">
			<form action="" method="post" class="searchAjax">
				<div class="row">
					<div class="col-md-offset-2 col-md-8">
						<div class="row" id="inputTitle">
							<div class="col-md-9">
								<input class="form-control" type="text" name="name" id="name" placeholder="タイトル"/>
							</div>
							<div class="col-md-3">
								<button class="btn btn-success" type="submit" id="serach">
									検索
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?= $this->Html->link('施設追加',['controller' => 'Manager', 'action' => 'FacilityRegist'], ['class' => 'btn btn-primary']);?>
		</div>
	</div>

	<div id="result">
		<?= $this->element('Manager/facilitiesResult');?>
	</div>
</div>
