<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
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
<form action="" method="POST">


<p>制作物タイトル</p>
<input type="text" id="reqT_con" name="requestT_con" readonly value=<?php echo $input_title?>>

<p>制作個数</p>
<input type="text" id="reqN_con" name="requestN_con" readonly value=<?php echo $input_num?>>

<p>締切日</p>
<input type="text" id="reqD_con" name="requestD_con" readonly value=<?php echo $input_date?>>
<br>

<button type="button" class="button" onclick="location.href='/silver/request/edit/'">修正</button>
<button type="submit" class="button" name="ok" onclick="">確定</button>

</div>
</form>
