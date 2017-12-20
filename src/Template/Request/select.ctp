<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	echo $this->Html->script('/private/js/searchAjax.js');
	$this->end();

	$this->start('css');
	echo $this->Html->css('/private/css/request/request.css');
	$this->end();
?>

<div class="col-md-offset-2 col-md-8">
	<div class="row center">
		<h2>修正依頼選択</h2>
		<div class="form-group">
			<div class="form-inline sear-lay">
				<form class="form-inline center" action="" method="POST" onsubmit="doSomething();return false;">
					<input type="text" name="dummy" style="display:none;">
					<input type="text" id="rsearch" name="search" value="" class="form-control"/>
					<button type="button" id="editReqbutton" name="sbutton" class="btn btn-success">検索</button>
				</form>
			</div>
		</div>
		<?php if ($reqlist == NULL): ?>
			<br>
			<h>編集可能な依頼がありません。</h>
			<br>
			<?= $this->Html->link('トップへ',["controller" => "TopPage","action" => "index"],['class'=>'btn btn-primary'])?>

		<?php else: ?>
			<table id="reqseltable" align="" class="table none-table">
				<thead>
					<tr>
						<th>件名</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>依頼先施設名</th>
					</tr>
				</thead>
			</table>
			<div id='result'><?= $this->element('Request/reqSelect');?></div>
			<div class="btn-sub">
				<?= $this->Html->link('戻る',["controller" => "Request","action" => "index"],['class'=>'btn btn-primary'])?>
				<?= $this->Html->link('トップへ',["controller" => "TopPage","action" => "index"],['class'=>'btn btn-primary'])?>
			</div>
		<?php endif; ?>
	</div>
</div>
