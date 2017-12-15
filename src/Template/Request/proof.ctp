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
if ($this->request->is('post')){
	$input_title = $_SESSION['request']['title'];
	$input_num = $_SESSION['request']['number'];
	$input_date = $_SESSION['request']['date'];
	$input_ws = $_SESSION['request']['wsid'];
	$input_faci_id = $_SESSION['facility']['facility_id'];
	$input_faci_name = $_SESSION['facility']['facility_name'];
	$input_faci_address = $_SESSION['facility']['facility_address'];

	$noid = 0;
	if ($input_ws == "") {
		$noid = 1;
	}else {

	}
}
  ?>



<div class="col-md-offset-2 col-md-8 center">
	<h2>確認</h2>
	<p>確定すると<u><font class="p-color">依頼先</font></u>と<u><font class="p-color">ワークショップID</font></u>の変更はできません。</p>
	<div class="row">
		<div class="col-md-offset-3 col-md-8">
			<form action="" method="POST" id="form">
				<p class="font-p">依頼先</p>
				<input type="text" id="reqFN_con" class="form-control" name="requestFN_con" readonly value=<?php echo $input_faci_name?>>
				<p class="font-p">依頼先所在地</p>
				<input type="text" id="reqFA_con" class="form-control" name="requestFA_con" readonly value=<?php echo $input_faci_address?>>
				<p class="font-p">制作物タイトル</p>
				<input type="text" id="reqT_con" class="form-control" name="requestT_con" readonly value=<?php echo $input_title?>>
				<p class="font-p">制作個数</p>
				<input type="text" id="reqN_con" class="form-control" name="requestN_con" readonly value=<?php echo $input_num?>>
				<!--wsidがない場合は次の処理を行わない-->
				<?php if ($noid == 0) : ?>
					<p class="font-p">ワークショップID</p>
					<input type="text" id="wsID_con" class="form-control" name="wsID_con" readonly value=<?php echo $input_ws?>>
				<?php endif; ?>

				<p class="font-p">締切日</p>
				<input type="text" id="reqD_con" class="form-control" name="requestD_con" readonly value=<?php echo $input_date?>>

				<div class="btn-sub">
					<?= $this->Html->link('修正',["controller" => "request","action" => "create",'id' => $_SESSION['facility']['facility_id']],['class'=>'btn btn-primary'])?>
					<button type="submit" class="btn btn-success" name="ok" id="ok" onclick="">確定</button>
				</div>
			</form>
		</div>
	</div>
</div>
