<?php
	$this->start('script');
		echo $this->Html->script('/private/js/request/request.js');
	$this->end();
	$this->start('css');
		echo $this->Html->css('/private/css/kota/request.css');
	$this->end();
?>

<div class="col-md-offset-2 col-md-8">
	<div class="row center">
		<h2>依頼先一覧<h2>
		<form class="form-inline" action="" method="GET" onsubmit="doSomething();return false;">
			<input type="text" name="dummy" style="display:none;"/>
		<?php if ($user_faci[0]['facility_classes_id'] == 1): ?>
			<div class="form-group">
				<div class="input-group">
					<input type="text" id="fsearch" name="search" value="" class="form-control"/>
					<button type="button" id="searchbutton" name="sbutton" class="btn btn-success">検索</button>
				</div>
			</div>
		</form>
		<table id="facitable" class="table row">
			<tr>
				<td class="col-md-6">施設名</td>
				<td class="col-md-6">所在地</td>
			</tr>
		</table>
		<?php foreach ($facilities as $facility) : ?>
			<div class="row panel">
				<a href="#">
					<div id="fname" class="col-md-6">
						<p><?php echo $facility['name']?></p>
					</div>
					<div id="faddress" align="justify" class="col-md-6">
						<?php echo $facility['address']?>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
			<button type="button" class="btn btn-primary" onclick="location.href='/silver/request/select'">依頼編集・取り消し画面はこちら</button><br>
			<button type="button" class="btn btn-primary" onclick="location.href='/silver/'">トップへ</button>
		<?php else: ?>
			<h2>介護施設の方は依頼の作成は出来ません<h2>
			<button type="button" class="btn btn-primary" onclick="location.href='/silver/'">トップへ</button>
		<?php endif; ?>
	</div>
</div>
