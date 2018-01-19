<?php $this->start('title'); ?>
依頼 一覧-
<?php $this->end(); ?>
<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	echo $this->Html->script('/private/js/searchAjax.js');
	$this->end();
?>

<?php
	$this->start('css');
	echo $this->Html->css('/private/css/request/request.css');
	$this->end();
 ?>


<div class="col-md-12">
	<div class="row center">
		<h2>依頼一覧</h2>
		<form class="form-inline searchAjax" action="" method="POST">
			<div class="sear-lay">
				<input type="text" id="rsearch" name="search" value="" class="search form-control"/>
				<button type="submit" id="Reqsearchbutton" name="sbutton" class="btn btn-success">検索</button>
			</div>
		</form>
		<?php if ($user_faci[0]['facility_classes_id'] == 2): ?>
			<select id="selectbox" onchange="select_state()">
				<option value="0">すべて</option>
				<option value="1">受注中のみ</option>
				<option value="2">受注可能のみ</option>
			</select>

			<table id="request-tab"class="row table none-table">
				<thead>
					<tr>
						<th class="col-md-4">件名</th>
						<th class="col-md-6">依頼元施設名</th>
						<th class="col-md-2">受注状況</th>
					</tr>
				</thead>
			</table>

			<div id='searchAjaxResult'><?= $this->element('Request/reqLigg');?></div>


		<?php else: ?>
			<select id="selectbox" onchange="select_state()">
				<option value="0">すべて</option>
				<option value="1">受注中のみ</option>
				<option value="2">依頼中のみ</option>
			</select>

			<table id="request-tab"class="row table none-table">
				<thead>
					<tr>
						<td class="col-md-4">件名</td>
						<td class="col-md-7">依頼先施設名</td>
						<td class="col-md-1">依頼状況</td>
					</tr>
				</thead>
			</table>
			<div id='searchAjaxResult'><?= $this->element('Request/reqLihoiku');?></div>

			<div class="btn-sub right">
					<?= $this->Html->link('トップへ',["controller" => "TopPage","action" => "index"],['class'=>'btn btn-primary'])?>
			</div>
		<?php endif; ?>
	</div>
</div>
