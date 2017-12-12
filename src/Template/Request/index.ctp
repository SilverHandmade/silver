<?php
	$this->start('script');
		echo $this->Html->script('/private/js/request/request.js');
	$this->end();
	$this->start('css');
		echo $this->Html->css('/private/css/kota/request.css');
	$this->end();
?>

<div class="col-md-offset-2 col-md-8">
	<div class="row">
		<h2 class="center">依頼先一覧</h2>
		<form class="form-inline center" action="" method="GET" onsubmit="doSomething();return false;">
			<input type="text" name="dummy" style="display:none;"/>
		<?php if ($user_faci[0]['facility_classes_id'] == 1): ?>
			<div class="form-group">
				<div class="form-inline sear-lay">
					<input type="text" id="fsearch" name="search" value="" class="form-control"/>
					<button type="button" id="searchbutton" name="sbutton" class="btn btn-success">検索</button>
				</div>
			</div>
		</form>

		<!-- <h2 class="center">依頼先一覧</h2> -->

		<table id="facitable" class="table">
			<thead>
				<tr>
					<th>施設名</th>
					<th>所在地</th>
				</tr>
			</thead>
		</table>
			<?php foreach ($facilities as $facility) : ?>
 				<div class="row panel list-panel">
					<a href="<?= $this->Url->build(["controller" => "request","action" => "create",'id' => $facility['id']])?>">
 						<div id="fname"class="col-md-6">
							<?php echo $facility['name']?>
 						</div>
	 					<div id="faddress" align="justify col-md-6">
	 						<?php echo $facility['address']?>
	  					</div>
					</a>
  				</div>
  				<?php endforeach; ?>
			<div class="center">
				<button type="button" class="btn btn-primary" onclick="location.href='<?= $this->Url->build(["controller" => "Request","action" => "select"])?>'">依頼編集・取り消し画面はこちら</button>
				<button type="button" class="btn btn-primary" onclick="location.href='<?= $this->Url->build(["controller" => "TopPage","action" => "index"])?>'">トップへ</button>
			</div>
			<?php else: ?>
				<h2>介護施設の方は依頼の作成は出来ません<h2>
				<button type="button" class="btn btn-primary" onclick="location.href='<?= $this->Url->build(["controller" => "TopPage","action" => "index"])?>'">トップへ</button>
			<?php endif; ?>
	</div>
</div>
