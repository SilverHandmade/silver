<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();
?>




<div class="col-md-offset-2 col-md-8">
	<div class="row center">
		<h2>修正依頼選択<h2>
		<form class="" action="" method="POST">
			<button type="submit" id="cancel" name="cancelbtn" class="submit-button">依頼取り消し</button>

			<p>依頼先</p>
			<input type="text" id="reqselFN_con" name="requestselFN_con" readonly value=<?php echo $_POST['selrequest_id']?>>
			<p>依頼先所在地</p>
			<input type="text" id="reqselFA_con" name="requestselFA_con" readonly value=<?php echo $input_faci_address?>>
			<p>制作物タイトル</p>
			<input type="text" id="reqselT_con" name="requestselT_con" readonly value=<?php echo $input_title?>>
			<p>制作個数</p>
			<input type="text" id="reqselN_con" name="requestselN_con" readonly value=<?php echo $input_num?>>
			<!--wsidがない場合は次の処理を行わない-->
			<?php if ($noid == 0) : ?>
				<p>ワークショップID</p>
				<input type="text" id="selwsID_con" name="selwsID_con" readonly value=<?php echo $input_ws?>>
			<?php endif; ?>

			<p>締切日</p>
			<input type="text" id="selreqD_con" name="selrequestD_con" readonly value=<?php echo $input_date?>>
			<br>
		</form>
	</div>
</div>
