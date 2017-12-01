<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();

	$this->start('css');
	echo $this->Html->css('/private/css/kota/request.css');
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
	<p class="font-title">確認</p>
	<a>確定すると依頼先とワークショップIDの変更はできません。</a>
	<div class="row">
		<div class="col-md-offset-3 col-md-8">
			<form action="" method="POST" id="form">


				<p class="font-p">依頼先</p>
				<input type="text" id="reqFN_con" class="type-text" name="requestFN_con" readonly value=<?php echo $input_faci_name?>>
				<p class="font-p">依頼先所在地</p>
				<input type="text" id="reqFA_con" class="type-text" name="requestFA_con" readonly value=<?php echo $input_faci_address?>>
				<p class="font-p">制作物タイトル</p>
				<input type="text" id="reqT_con" class="type-text" name="requestT_con" readonly value=<?php echo $input_title?>>
				<p class="font-p">制作個数</p>
				<input type="text" id="reqN_con" class="type-text" name="requestN_con" readonly value=<?php echo $input_num?>>
				<!--wsidがない場合は次の処理を行わない-->
				<?php if ($noid == 0) : ?>
					<p class="font-p">ワークショップID</p>
					<input type="text" id="wsID_con" class="type-text" name="wsID_con" readonly value=<?php echo $input_ws?>>
				<?php endif; ?>

				<p class="font-p">締切日</p>
				<input type="text" id="reqD_con" class="type-text" name="requestD_con" readonly value=<?php echo $input_date?>>

				<div class="btn-sub">
					<button type="button" class="button btn-sub" onclick="location.href='/silver/request/create/'">修正</button>
					<button type="submit" class="button btn-sub" name="ok" onclick="">確定</button>
				</div>
			</form>
		</div>
	</div>
</div>
