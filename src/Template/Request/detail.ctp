<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();

	$this->start('css');
	echo $this->Html->css('/private/css/kota/detail.css');
	// echo $this->Html->css('/private/css/kota/request.css');
	$this->end();
?>

<div class="col-md-offset-2 col-md-8">
	<div class="row center">
		<h2>依頼詳細情報</h2>
		<table id="detailtbl" align="" class="table">
			<form action="" method="POST">
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
				<?php if ($user_faci[0]['facility_classes_id'] == 1): ?>
				<tr>
					<th class="center"><p>依頼先施設：</p></th>
					<td><p><?php echo $faci_saki_info[0]['name'] ?></p></td>
				</tr>
				<tr>
					<th class="center"><p>依頼先所在地：</p></th>
					<td><p><?php echo $faci_saki_info[0]['address'] ?></p></td>
				</tr>
				<tr>
					<th class="center"><p>依頼先郵便番号：</p></th>
					<td><p><?php echo $faci_saki_info[0]['Post'] ?></p></td>
				</tr>
				<?php endif; ?>
				<?php if ($user_faci[0]['facility_classes_id'] == 2): ?>
				<tr>
					<th class="center"><p>依頼元施設：</p></th>
					<td><p><?php echo $faci_moto_info[0]['name'] ?></p></td>
				</tr>
				<tr>
					<th class="center"><p>依頼元所在地：</p></th>
					<td><p><?php echo $faci_moto_info[0]['address'] ?></p></td>
				</tr>
				<tr>
					<th class="center"><p>依頼元郵便番号：</p></th>
					<td><p><?php echo $faci_moto_info[0]['Post'] ?></p></td>
				</tr>
				<?php endif; ?>
				<?php if ($req_info[0]['product_id'] != ""): ?>
					<tr>
						<th class="center"><p>ワークショップID：</p></th>
						<td><p><?php echo $req_info[0]['product_id'] ?></p></td>
					</tr>
				<?php endif; ?>
				<?php foreach ($pdt_info as $pinfo) : ?>
					<tr align="center">

						<td colspan="3"><div align="center"><p><b>手順<?php echo $pinfo['ren'] + 1 ?></b></p></div>
						<div align="center"><img src="<?= $this->Url->image('workshop/'.$pinfo['photo_url'])?>" width="500" height="325"></div>
						<div align="center"><p><?php echo $pinfo['description'] ?></p></div>

					</td>

			</tr>
		<?php endforeach; ?>




</table>
<?php if ($user_faci[0]['facility_classes_id'] == 2 && $req_info[0]['ju_flg'] == 0): ?>
	<button type="submit" class="button" name="order" id="order">依頼を受ける</button>
	<button type="button" class="button" onclick="location.href='/silver/request/list'">依頼一覧へ</button>
	<button type="button" class="button" onclick="location.href='<?= $this->Url->build(["controller" => "TopPage","action" => "index"])?>'">トップへ</button>
<?php endif; ?>
<?php if ($user_faci[0]['facility_classes_id'] == 2 && $req_info[0]['ju_flg'] == 1): ?>
	<button type="button" class="button" onclick="location.href='/silver/request/list'">依頼一覧へ</button>
	<button type="button" class="button" onclick="location.href='<?= $this->Url->build(["controller" => "TopPage","action" => "index"])?>'">トップへ</button>
<?php endif; ?>
<?php if ($user_faci[0]['facility_classes_id'] == 1 && $req_info[0]['ju_flg'] == 0): ?>
	<button type="button" class="button" onclick="location.href='/silver/request/list'">依頼一覧へ</button>
	<button type="button" class="button" onclick="location.href='<?= $this->Url->build(["controller" => "TopPage","action" => "index"])?>'">トップへ</button>
<?php endif; ?>
<?php if ($user_faci[0]['facility_classes_id'] == 1 && $req_info[0]['ju_flg'] == 1): ?>
	<button type="submit" class="button" name="kanryo" id="kanryo">依頼完了</button>
	<button type="button" class="button" onclick="location.href='/silver/request/list'">依頼一覧へ</button>
	<button type="button" class="button" onclick="location.href='<?= $this->Url->build(["controller" => "TopPage","action" => "index"])?>'">トップへ</button>
<?php endif; ?>

	</form>
</div>
</div>
