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
			<div class="col-md-offset-2 col-md-8">
				
				<p>添付画像</p>
				<div class="row">
					<img src="<?= $this->Url->image('workshop/'.$edit_req[0]['midasi_url'])?>" class="img-size">
				</div>
				<div class="div-btn">
					<button type="button" name="bbupload" id="" class="btn btn-info ws-detail">画像選択
						<input type="file" id="" name="requestselT_con" class="input-file none file" required accept="image/*" value=<?php if ($_SESSION['edit_flg'] == 1) {
							echo $_SESSION['req_edit']['midasi_url'];}else{ echo $edit_req[0]['midasi_url'];}?>>
					</button>
					<span id="fake_input_file" class="margin-left span">NOT FILE</span>
				</div>
				<p>手順説明</p>
				<input type="text" id="" name="requestselT_con" class="form-control" required value=<?php if ($_SESSION['edit_flg'] == 1) {
					echo $_SESSION['req_edit']['description'];}else{ echo $edit_req[0]['description'];}?>>
				<div>
					<?= $this->Html->link("戻る",['controller' => 'workshop', "action" => "select"], ['class'=>'btn btn-primary']);?>
					<button type="submit" id="cancel" name="Pdtcancelbtn" class="btn btn-primary ">削除</button>
				</div>
			</div>
		</form>
	</div>
</div>
