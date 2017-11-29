<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();

	$this->start('css');
	echo $this->Html->css('/private/css/kota/detail.css');
	$this->end();
?>


<div class="col-md-offset-2 col-md-8">
	<div class="row center">
		<h2>依頼詳細情報</h2>
		<table id="detailtbl" align="" class="table">
			<form action="" method="POST" >
				<tr>
					<th class="center"><p>タイトル：</p></th>
					<td><p><?php echo $req_info[0]['title'] ?></p></td>
				</tr>
				<tr>
					<th class="center"><p>依頼個数：</p></th>
					<td><p><?php echo $req_info[0]['su'] ?>個</p></td>
				</tr>
				<tr>
					<th class="center"><p>依頼日：</p></th>
					<td><p><?php echo $req_info[0]['From_date'] ?></p></td>
				</tr>
				<tr>
					<th class="center"><p>締め切り日：</p></th>
					<td><p><?php echo $req_info[0]['To_date'] ?></p></td>
				</tr>
				<tr>
					<th class="center"><p>依頼元施設：</p></th>
					<td><p><?php echo $faci_info[0]['name'] ?></p></td>
				</tr>
				<tr>
					<th class="center"><p>依頼元所在地：</p></th>
					<td><p><?php echo $faci_info[0]['address'] ?></p></td>
				</tr>
				<tr>
					<th class="center"><p>依頼元郵便番号：</p></th>
					<td><p><?php echo $faci_info[0]['Post'] ?></p></td>
				</tr>
				<?php if ($req_info[0]['product_id'] != ""): ?>
					<tr>
						<th class="center"><p>ワークショップID：</p></th>
						<td><p><?php echo $req_info[0]['product_id'] ?></p></td>
					</tr>
				<?php endif; ?>
				<?php foreach ($pdt_info as $pinfo) : ?>
					<tr>

						<td colspan="3"><p>手順<?php echo $pinfo['ren'] + 1 ?></p>
						<img src= alt="TAG index" border="0">
						<p><?php echo $pinfo['description'] ?></p></td>

			</tr>
		<?php endforeach; ?>




</table>
<?php if ($user_faci[0]['facility_classes_id'] == 2): ?>
	<button type="submit" class="button" name="order">依頼を受ける</button>
<?php else: ?>
	<button type="button" class="button" onclick="location.href='/silver/'">トップへ</button>
<?php endif; ?>

	</form>
</div>
</div>
