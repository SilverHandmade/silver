<?php $this->start('css'); ?>
	<?= $this->Html->css('/private/css/kota/workshop.css') ?>
	<?= $this->Html->css('/webroot/css/src/bootstrap.css')?>
	<?= $this->Html->css('workshop.css') ?>
	<?= $this->Html->script('/private/js/kota/workshop.js') ?>
<?php $this->end(); ?>

<script>
	// function add()
	// {
	// 	// var div_element = document.createElement("div");
	// 	// div_element.innerHTML = '';
	// 	// var parent_object = document.getElementById("aa");
	// 	// parent_object.appendChild(div_element);
    //
	// }
	$(function(){
		$('#add').click(function() {
			$('#plus').after(
				$('#plus').clone()
			);
		});
	});
</script>

<div class="center">
	<p class="font-title">ワークショップ</p>
		<form class="" action="index.html" method="post" id="form">
			<div id="aa">
				<div class="row div-bottom">
					<div id="plus">
						<div class="col-md-2">
							<p class="font-p">タイトル</p>
							<input type="text" name="title" value="">
						</div>
						<div class="col-md-2">
							<p class="font-p">イメージ</p>
							<input type="file" name="" id="file" style="display:none;" onchange="$('#fake_input_file').val($(this).val())">
							<input type="button" value="写真" onClick="$('#file').click();" class="button">
						</div>
						<div class="col-md-8">
							<p class="font-p">コメント</p>
							<input type="text" name="work">
						</div>
					</div>

				</div>
			</div>
			<p><button type="submit" name="" class="button">送信</button></p>
		</form>
		<div class="row">
		</div>
		<div class="glyphicon glyphicon-plus-sign" id="add"></div>
	</div>
</div>
