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
			<button type="submit" id="cancel" name="Pdtcancelbtn" class="btn btn-primary ">ワークショップを削除</button>
			<div>
				<?= $this->Html->link(">>戻る",['controller' => 'workshop', "action" => "select"]);?>
			</div>
			<?php foreach ($edit_pdt as $key): ?>
				<p>添付画像</p>
				<div align="center">
					<?php if (!empty($key['photo_url']) && file_exists('img/workshop/'.$key['photo_url'])): ?>
						<img src="<?= $this->Url->image('workshop/'.$key['photo_url']) ?>"width="500" height="325">
					<?php else: ?>
						<img src="<?= $this->Url->image('no_image.png') ?>"width="500" height="325">
					<?php endif; ?>
				</div>

				<div class="col-md-3">
					<div class="div-btn">
						<input type="file" class="input-file none file" name="upload_gazo" id="G_upload" accept="image/*"/>
						<div class="button">
							<button type="button" name="upload" id="G_upload" class="btn btn-info">画像選択</button>
						</div>
					</div>
					<span id="fake_input_file" class="margin-left span">NOT FILE</span>
				</div>

				<div align="center">
					<p>手順説明</p>
					<input type="text" id="" name="requestselT_con"  required value=<?php if ($_SESSION['edit_flg'] == 1) {
						echo $_SESSION['req_edit']['description'];}else{ echo $key['description'];}?>>

				</div>
			<?php endforeach; ?>
				<br>
				<button type="submit" class="btn btn-primary" id="edit_con" name ="nextbtn">次へ</button>
				<?= $this->Html->link('戻る',["controller" => "workshop","action" => "select"],['class'=>'btn btn-primary'])?>
		</form>
	</div>
</div>
