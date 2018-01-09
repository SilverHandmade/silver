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
	<div class="row">
		<h2 class="center">依頼先一覧</h2>
		<form class="form-inline center" action="" method="POST" onsubmit="doSomething();return false;">
			<input type="text" name="dummy" style="display:none;"/>
		<?php if ($user_faci[0]['facility_classes_id'] == 1 || $user_faci[0]['facility_classes_id'] == 9): ?>
			<div class="form-group">
				<div class="form-inline sear-lay">
					<input type="text" id="fsearch" name="search" value="" class="form-control"/>
					<button type="submit" id="searchbutton" name="sbutton" class="btn btn-success">検索</button>
				</div>
			</div>
		</form>
		<table id="facitable" class="none-table table">
			<thead>
				<tr>
					<th>施設名</th>
					<th>所在地</th>
				</tr>
			</thead>
		</table>
		<div id='result'><?= $this->element('Request/reqIndex');?></div>
			<div class="btn-sub">
				<?= $this->Html->link('依頼編集・取り消し画面はこちら',["controller" => "Request","action" => "select"],['class'=>'btn btn-primary'])?>
				<?= $this->Html->link('トップへ',["controller" => "TopPage","action" => "index"],['class'=>'btn btn-primary'])?>
			</div>
		<?php elseif($user_faci[0]['facility_classes_id'] == 2): ?>
				<h2>介護施設の方は依頼の作成は出来ません<h2>
				<?= $this->Html->link('トップへ',["controller" => "TopPage","action" => "index"],['class'=>'btn btn-primary'])?>
			<?php endif; ?>
	</div>
</div>
