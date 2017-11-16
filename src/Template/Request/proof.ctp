<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
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
<form action="" method="POST" >



<p><?php echo $user_faci ?></p>
<p><?php echo $input_faci_id ?></p>
<p>依頼先</p>
<input type="text" id="reqFN_con" name="requestFN_con" value=<?php echo $input_faci_name?>>
<p>依頼先所在地</p>
<input type="text" id="reqFA_con" name="requestFA_con" value=<?php echo $input_faci_address?>>
<p>制作物タイトル</p>
<input type="text" id="reqT_con" name="requestT_con" value=<?php echo $input_title?>>
<p>制作個数</p>
<input type="text" id="reqN_con" name="requestN_con" value=<?php echo $input_num?>>
<!--wsidがない場合は次の処理を行わない-->
<?php if ($noid == 0) : ?>
	<p>ワークショップID</p>
	<input type="text" id="wsID_con" name="wsID_con" value=<?php echo $input_ws?>>
<?php endif; ?>

<p>締切日</p>
<input type="text" id="reqD_con" name="requestD_con" value=<?php echo $input_date?>>

<button type="button" class="button" onclick="location.href='/silver/request/create/'">修正</button>
</div>
</form>
