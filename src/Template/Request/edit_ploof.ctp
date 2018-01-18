<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();

	$this->start('css');
	echo $this->Html->css('/private/css/request/request.css');
	$this->end();
?>

<?php
$user_faci = $_SESSION['Auth']['User']['facilities_id'];
	$input_title = $_SESSION['req_edit']['title'];
	$input_num = $_SESSION['req_edit']['number'];
	$input_date = $_SESSION['req_edit']['date'];
	if($input_title != ""){
		$_SESSION['edit_flg'] = 1;
	}
?>



<div class="col-md-offset-2 col-md-8 center">
	<h2>確認</h2>
	<div class="row">
		<div class="col-md-offset-3 col-md-8">
			<form action="" method="POST" id="form">
				<p class="font-p">制作物タイトル</p>
				<input type="text" id="reqT_con" class="form-control" name="requestT_con" readonly value=<?php echo $input_title?>>
				<p class="font-p">制作個数</p>
				<input type="text" id="reqN_con" class="form-control" name="requestN_con" readonly value=<?php echo $input_num?>>
				<p class="font-p">締切日</p>
				<input type="text" id="reqD_con" class="form-control" name="requestD_con" readonly value=<?php if ($_SESSION['dateCheck'] == 1) {
					echo $input_date;}else{ echo $_SESSION['req_edit']['moto_date'];}?>>
				<div class="btn-sub right">
					<?= $this->Html->link('修正',["controller" => "request","action" => "edit",'id' => $_SESSION['sel_id']],['class'=>'btn btn-primary'])?>
					<button type="submit" class="btn btn-success" name="edit_ok" id="edit_ok" onclick="">確定</button>
				</div>
			</form>
		</div>
	</div>
</div>
