<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();

	$this->start('css');
	echo $this->Html->css('/private/css/kota/request.css');
	$this->end();

?>



<div class="col-md-offset-2 col-md-8">
	<div class="row center">
		<h2>修正依頼選択<h2>
		<form class="" action="" method="POST">
			<button type="submit" id="cancel" name="Reqcancelbtn" class="btn btn-primary ">依頼取り消し</button>


			<p>制作物タイトル</p>
			<input type="text" id="reqselT_con" name="requestselT_con"  required value=<?php if ($_SESSION['edit_flg'] == 1) {
				echo $_SESSION['req_edit']['title'];}else{ echo $edit_req[0]['title'];}?>>
			<p>制作個数</p>
			<input type="number" id="reqselN_con" name="requestselN_con" min="1" max="999"  value=<?php if ($_SESSION['edit_flg'] == 1) {
				echo $_SESSION['req_edit']['number'];}else{ echo $edit_req[0]['su'];}?>>
			<p>締切日</p>
			<input type="checkbox" id="dateCheck" name="Dcheck" value="1">
			<input type="date" id="selreqD_con" name="selrequestD_con" required value=<?php if ($_SESSION['edit_flg'] == 1) {
				echo $_SESSION['req_edit']['moto_date'];}else{ echo date("Y-n-j", strtotime($edit_req[0]['To_date']));}?>>

			<br>
			<button type="submit" class="btn btn-primary" id="edit_con" name ="nextbtn">次へ</button>
			<button type="button" class="btn btn-primary" onclick="location.href='<?= $this->Url->build(["controller" => "Request","action" => "select"])?>'">戻る</button>
		</form>
	</div>
</div>
