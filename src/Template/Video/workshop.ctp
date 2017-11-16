<?php $this->start('css'); ?>
	<?= $this->Html->css('/private/css/kota/workshop.css') ?>
<?php $this->end(); ?>
<?php $this->start('script'); ?>
	<?= $this->Html->script('/private/js/kota/workshop.js') ?>
<?php $this->end(); ?>


<div class="col-md-offset-1 col-md-10">
	<div class="">

	</div>
</div>



<!-- <div class="center">

	<p class="font-title">ワークショップ</p>
		<form class="" action="" method="post" id="form">
			<div class="row div-bottom">
				<div class="col-md-5">
					<p class="font-p">タイトル</p>
					<input type="text" name="title" value="">
				</div>
			</div>
			<div class="row div-bottom" id="plus">
				<div class="col-md-2">
					<p class="font-p">イメージ</p>
					<input type="file" name="" id="file" style="display:none;" onchange="$('#fake_input_file').val($(this).val())">
					<input type="button" value="写真" onClick="$('#file').click();" class="button">
				</div>
				<div class="col-md-8">
					<p class="font-p">コメント</p>
					<input type="text" name="Model/field" id="text">
				</div>
			</div>
			<button type="submit" name="" class="button" id="submit">送信</button>
		</form>
		<div class="row">
		</div>
		<div id="add">
			<span class="glyphicon glyphicon-plus-sign"></span>
		</div>
	</div>
</div> -->
