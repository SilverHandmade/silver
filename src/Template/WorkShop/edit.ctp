<div class="col-md-offset-2 col-md-8">
	<div class="row center">
		<h2>編集入力画面</h2>
		<form class="" action="" method="post">
			<button type="submit" id="cancel" name="Pdtcancelbtn" class="btn btn-primary ">削除</button>

			<p>添付画像</p>
			<div align="center"><img src="<?= $this->Url->image('workshop/'.$edit_req[0]['midasi_url'])?>" width="500" height="325"></div>
				<input type="file" id="" name="requestselT_con"  required value=<?php if ($_SESSION['edit_flg'] == 1) {
					echo $_SESSION['req_edit']['midasi_url'];}else{ echo $edit_req[0]['midasi_url'];}?>>

			<p>手順説明</p>
				<input type="text" id="" name="requestselT_con"  required value=<?php if ($_SESSION['edit_flg'] == 1) {
					echo $_SESSION['req_edit']['description'];}else{ echo $edit_req[0]['description'];}?>>
					<tr>
						<?= $this->Html->link(">>戻る",['controller' => 'workshop', "action" => "select"]);?>
					</tr>

		</form>
