<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();
?>

<?php
	$this->start('css');
	echo $this->Html->css('/private/css/kota/request.css');
	$this->end();
 ?>


<div class="col-md-12">
	<div class="row center">
		<h2>依頼一覧<h2>
		<form class="" action="" method="GET" onsubmit="doSomething();return false;">
			<input type="text" name="dummy" style="display:none;">
			<input type="text" id="rsearch" name="search" value=""/><button type="button" id="Reqsearchbutton" name="sbutton" class="submit-button">検索</button>
		</form>

		<table id="reqtable" align="" class="table">

			<?php if ($user_faci[0]['facility_classes_id'] == 2): ?>
				<thead>
					<tr>
						<th>件名</th>
						<th>依頼元施設名</th>
						<th>受注状況</th>
					</tr>
				</thead>
			<?php foreach ($reqs as $req) : ?>

			<tbody>
				<tr class="panel">
						<td id="rtitle">
							<a href="<?= $this->Url->build(["controller" => "request","action" => "detail", 'id' => $req['id']])?>"><?php echo $req['title']?></a>
						</td>
						<td id="rfaci_name">
							<p><?php echo $req['facilities']['name']?></p>
						</td>
						<td id="req_state">
							<?php if ($req['ju_flg'] != NULL): ?>
								<p class="p-jutyu">受注中</p>
							<?php endif; ?>
							<?php if ($req['ju_flg'] == NULL): ?>
								<p>受注可能</p>
							<?php endif; ?>
						</td>
				</tr>

			<?php endforeach; ?>
			<tr>
				<td colspan="3"><button type="button" class="button" onclick="location.href='/silver/'">トップへ</button></td>
			</tr>
			</div>

			<?php else: ?>
				<thead>
					<tr>
						<th width="400">件名</th>
						<th width="500">依頼先施設名</th>
						<th width="120">依頼状況</th>
					</tr>
				</thead>
				<?php foreach ($reqs_hoiku as $req) : ?>
				<tbody>
					<tr class="panel">
							<td id="rtitle">
								<a href="<?= $this->Url->build(["controller" => "request","action" => "detail", 'id' => $req['id']])?>"><?php echo $req['title']?></a>
							</td>
							<td id="rfaci_name">
								<p><?php echo $req['facilities']['name']?></p>
							</td>
							<td id="req_state">
								<?php if ($req['ju_flg'] != NULL): ?>
									<p class="p-jutyu">受注中</p>
								<?php endif; ?>
								<?php if ($req['ju_flg'] == NULL): ?>
									<p>依頼中</p>
								<?php endif; ?>
							</td>
					</tr>

				<?php endforeach; ?>
				<tr>
					<td colspan="3"><button type="button" class="button" onclick="location.href='/silver/'">トップへ</button></td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>


</div>
