<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();
?>


<div class="col-md-offset-2 col-md-8">
	<div class="row center">
		<h2>依頼詳細情報</h2>
<table id="detailtbl" align="" class="table">
	<form action="" method="POST" >



		<tr>
			<td><p>タイトル：</p></td>
			<td><p><?php echo $req_info[0]['title'] ?></p></td>
		</tr>
		<tr>
			<td><p>依頼個数：</p></td>
			<td><p><?php echo $req_info[0]['su'] ?>個</p></td>
		</tr>
		<tr>
			<td><p>依頼日：</p></td>
			<td><p><?php echo $req_info[0]['From_date'] ?></p></td>
		</tr>
		<tr>
			<td><p>締め切り日：</p></td>
			<td><p><?php echo $req_info[0]['To_date'] ?></p></td>
		</tr>
		<tr>
			<td><p>依頼元施設：</p></td>
			<td><p><?php echo $faci_info[0]['name'] ?></p></td>
		</tr>
		<tr>
			<td><p>依頼元所在地：</p></td>
			<td><p><?php echo $faci_info[0]['address'] ?></p></td>
		</tr>
		<tr>
			<td><p>依頼元郵便番号：</p></td>
			<td><p><?php echo $faci_info[0]['Post'] ?></p></td>
		</tr>

		<?php foreach ($pdt_info as $pinfo) : ?>
			<tr>

				<td colspan="3"><p>手順<?php echo $pinfo['ren'] + 1 ?></p>
				<img src= alt="TAG index" border="0">
				<p><?php echo $pinfo['description'] ?></p></td>

			</tr>
		<?php endforeach; ?>




</table>
	<button type="submit" class="button" name="order">依頼を受ける</button>
	</form>
</div>
</div>
