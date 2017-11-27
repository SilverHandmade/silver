<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();
?>




<div class="col-md-offset-2 col-md-8">
	<div class="row center">
		<h2>修正依頼選択<h2>
		<form class="" action="/silver/" method="POST">
			<button type="submit" id="cancel" name="Reqcancelbtn" class="submit-button">依頼取り消し</button>

			<p>依頼先</p>
			<input type="text" id="reqselFN_con" name="requestselFN_con" readonly value=<?php echo $edit_reqsaki[0]['name']?>>
			<p>依頼先所在地</p>
			<input type="text" id="reqselFA_con" name="requestselFA_con" readonly value=<?php echo $edit_reqsaki[0]['address']?>>
			<p>制作物タイトル</p>
			<input type="text" id="reqselT_con" name="requestselT_con" value=<?php echo $edit_req[0]['title']?>>
			<p>制作個数</p>
			<input type="number" id="reqselN_con" name="requestselN_con" min="1" max="999" value=<?php echo $edit_req[0]['su']?>>
			<?php

			$noid = 0;
			if ($edit_req[0]['product_id'] == "") {
				$noid = 1;
			}else {

			} ?>

			<!--wsidがない場合は次の処理を行わない-->
			<?php if ($noid == 0) : ?>
				<p>ワークショップID</p>
				<input type="text" id="selwsID_con" name="selwsID_con" value=<?php echo $edit_req[0]['product_id']?>>
			<?php endif; ?>

			<p>締切日</p>
			<input type="date" id="selreqD_con" name="selrequestD_con" value=<?php echo date("Y-n-j", strtotime($edit_req[0]['To_date']))?>>
			<br>
			<button type="submit" class="button" id="edit_con" onclick="return edit_confirm()">次へ</button>
		</form>
	</div>
</div>
