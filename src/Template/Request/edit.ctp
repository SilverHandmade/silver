<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();

	$this->start('css');
	echo $this->Html->css('/private/css/request/request.css');
	$this->end();

?>



<div class="col-md-offset-2 col-md-8 center">
	<h2>修正依頼選択</h2>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<form class="form-group" action="" method="POST">
				<p class="font-p">制作物タイトル</p>
				<input type="text" id="reqselT_con" class="form-control" name="requestselT_con"  required value=<?php if ($_SESSION['edit_flg'] == 1) {
					echo $_SESSION['req_edit']['title'];}else{ echo $edit_req[0]['title'];}?>>
				<p class="font-p">制作個数</p>
				<input type="number" id="reqselN_con" class="form-control" name="requestselN_con" min="1" max="999"  value=<?php if ($_SESSION['edit_flg'] == 1) {
					echo $_SESSION['req_edit']['number'];}else{ echo $edit_req[0]['su'];}?>>
				<p class="font-p">
					締切日
					<label>
						<input type="checkbox" id="dateCheck" name="Dcheck" value="1" class="checkbox">
						<span class="checkbox-parts"></span>
					</label>
				</p>
				<input type="date" id="selreqD_con" class="form-control" name="selrequestD_con" required value=<?php if ($_SESSION['edit_flg'] == 1) {
					echo $_SESSION['req_edit']['moto_date'];}else{ echo date("Y-n-j", strtotime($edit_req[0]['To_date']));}?>>
				<div class="btn-sub">
					<button type="submit" id="cancel" name="Reqcancelbtn" class="btn btn-primary ">依頼取り消し</button>
					<button type="submit" class="btn btn-primary" id="edit_con" name ="nextbtn">次へ</button>
					<?= $this->Html->link('戻る',["controller" => "Request","action" => "select"],['class'=>'btn btn-primary'])?>
				</div>
			</form>
		</div>
	</div>
</div>
