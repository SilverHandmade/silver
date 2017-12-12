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
			<input type="text" id="rsearch" name="search" value="" class="search"/><button type="button" id="Reqsearchbutton" name="sbutton" class="btn btn-success">検索</button>
		</form>
		<?php if ($user_faci[0]['facility_classes_id'] == 2): ?>
			<table id="reqtable" align="" class="table row">
				<thead>
					<tr>
						<td class="col-md-4">件名</td>
						<td class="col-md-6">依頼元施設名</td>
						<td class="col-md-2">受注状況</td>
					</tr>
				</thead>
			</table>
			<?php foreach ($reqs as $req) : ?>

				<div class="row panel list-panel">
					<a href="">
						<div id="rtitle" class="col-md-4">
							<a href=""><?= $req['title'];?>
						</div>
						<div id="rfaci_name" class="col-md-6">
							<p><?= $req['facilities']['name'];?></p>
						</div>
						<div id="req_state" class="col-md-2">
							<?php if ($req['ju_flg'] != NULL): ?>
								<p class="p-jutyu">受注中</p>
							<?php endif; ?>
							<?php if ($req['ju_flg'] == NULL): ?>
								<p>受注可能</p>
							<?php endif; ?>
						</div>
					</a>
			</div>

			<?php endforeach; ?>
			<button type="button" class="btn btn-primary" onclick="location.href='/silver/'">トップへ</button>

		<?php else: ?>
			<table id="request-tab"class="row table">
				<thead>
					<tr>
						<td class="col-md-4">件名</td>
						<td class="col-md-7">依頼先施設名</td>
						<td class="col-md-1">依頼状況</td>
					</tr>
				</thead>
			</table>
			<?php foreach ($reqs_hoiku as $req) : ?>
				<div class="row panel list-panel">
					<a href="">
						<div id="rtitle" class="col-md-4">
							<p><?php echo $req['title']?></p>
						</div>
						<div id="rfaci_name" class="col-md-7">
							<p class="left"><?php echo $req['facilities']['name']?></p>
						</div>
						<div id="req_state" class="col-md-1">
							<?php if ($req['ju_flg'] != NULL): ?>
								<p class="p-jutyu">受注中</p>
							<?php endif; ?>
							<?php if ($req['ju_flg'] == NULL): ?>
								<p>依頼中</p>
							<?php endif; ?>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
			<button type="button" class="btn btn-primary" onclick="location.href='/silver/'">トップへ</button>
		<?php endif; ?>
	</div>
</div>
