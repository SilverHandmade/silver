<?php

	$this->start('css');
	echo $this->Html->css('/private/css/workshop/workshop.css');
	$this->end();

	$this->start('script');
	echo $this->Html->script('/private/js/workshop/workshop.js');
	$this->end();

 ?>
<div class="col-md-offset-2 col-md-8">
	<div class="row center">
		<div id="title">
			<h2>編集入力画面</h2>
		</div>
		<form class="" action="" method="post">
			<?php foreach ($edit_pdt as $key): ?>
				<p class="left">添付画像</p>
				<div class="row img-margin">
					<?php if (!empty($key['photo_url']) && file_exists('img/workshop/'.$key['photo_url'])): ?>
						<img src="<?= $this->Url->image('workshop/'.$key['photo_url']) ?>"width="450" height="300">
					<?php else: ?>
						<img src="<?= $this->Url->image('no_image.png') ?>"width="450" height="300">
					<?php endif; ?>
				</div>
				<div class="div-btn">
					<button type="button" name="bbupload" id="G_upload" class="btn btn-info ws-detail">画像選択
						<input type="file" id="G_upload" name="requestselT_con" class="input-file none file" required accept="image/*" value="">
					</button>
					<span id="fake_input_file" class="margin-left span">NOT FILE</span>
				</div>
				<div class="margin-bottom">
					<p class="left">手順説明</p>
					<input type="text" id="" name="requestselT_con" class="form-control" required value=<?php if ($_SESSION['edit_flg'] == 1) {
						echo $_SESSION['req_edit']['description'];}else{ echo $key['description'];}?>>
				</div>
			<?php endforeach; ?>

			<p class="left">追加フォーム</p>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group" id="plus" name="plus">
					<div class="row"
						<div class="col-md-9">
							<input class="form-control" type="text" name="text" id="Stext" placeholder="手順説明">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-info" type="button" id="add">
						<span class="glyphicon glyphicon-plus-sign" name="add"></span>
							画像を追加
						</button>
					</div>
				</div>

			<div class="right margin-top">
				<button type="submit" class="btn btn-primary" id="edit_con" name ="nextbtn">次へ</button>
				<?= $this->Html->link('戻る',["controller" => "workshop","action" => "select"],['class'=>'btn btn-primary'])?>
				<button type="submit" id="cancel" name="Pdtcancelbtn" class="btn btn-primary">削除</button>
			</div>
		</form>
	</div>
</div>
