<?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/manager/manager.css') ?>
<?php $this->end() ?>
<?php $this->start('script') ?>
	<?= $this->Html->script('https://ajaxzip3.github.io/ajaxzip3.js') ?>
<?php $this->end() ?>

<div class="col-md-12">
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
			<h2>施設登録</h2>
			<form class="form" action="" method="post">
				<label for="name">施設名</label>
				<input class="form-control" type="text" name="name" id="name" placeholder="施設名"/>

				<label for="post">郵便番号</label>
				<div class="row">
					<div class="col-md-3">
						<input class="form-control" type="text" name="zip11" size="10" maxlength="8" placeholder="郵便番号" onKeyUp="AjaxZip3.zip2addr(this,'','addr11','addr11');">
					</div>
				</div>

				<label for="address">住所</label>
				<input class="form-control" type="text" name="addr11" size="60" id="address" placeholder="住所">

				<div class="row right">
					<button class="btn btn-success " type="submit">登録</button>
				</div>
			</form>

		</div>
	</div>
</div>
