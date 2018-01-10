<?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/manager/manager.css') ?>
<?php $this->end() ?>
<?php $this->start('script') ?>
	<?= $this->Html->script('https://ajaxzip3.github.io/ajaxzip3.js') ?>
<?php $this->end() ?>

<div class="col-md-12">
	<div class="row">
		<div class="col-md-offset-2 col-md-8" id="form">
			<p class="form-title">施設登録</p>
			<div class="row">
				<div class="col-md-offset-3 col-md-6">
					<form class="form" action="" method="post">
						<div>
							<label for="name" class="font-color">施設名</label>
							<input class="form-control" type="text" name="name" id="name" placeholder="施設名"/>
							<?php foreach ($fClassArray as $key => $value): ?>
								<span>
									<input type="radio" name="fClassId" class="radio" value="<?= $value['id'] ?>" <?= $key==0?'checked':'';?> id="radio-<?= $value['id'] ?>">
									<label for="radio-<?= $value['id'] ?>"><?= $value['name'] ?></label>
								</span>
							<?php endforeach; ?>
						</div>

						<div>
							<label for="post" class="font-color">郵便番号</label>
							<div class="row">
								<div class="col-md-5">
									<input class="form-control" type="text" name="zip11" size="10" maxlength="8" placeholder="郵便番号" onKeyUp="AjaxZip3.zip2addr(this,'','addr11','addr11');">
								</div>
							</div>
							<label for="address" class="font-color">住所</label>
							<input class="form-control" type="text" name="addr11" size="60" id="address" placeholder="住所">
						</div>

						<div class="row right">
							<button class="btn btn-success" type="submit">登録</button>
						</div>
					</form>
				</div>
			</div>

		</div>

	</div>
</div>
