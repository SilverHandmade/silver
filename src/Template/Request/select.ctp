<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
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
				<input type="text" name="dummy" style="display:none;">
				<input type="text" id="rsearch" name="search" value="" class="form-control"/>
				<button type="button" id="editReqbutton" name="sbutton" class="btn btn-success">検索</button>
			</div>
		</div>
		<?php if ($reqlist == NULL): ?>
			<br>
			<h>編集可能な依頼がありません。</h>
			<br>
			<?= $this->Html->link('トップへ',["controller" => "TopPage","action" => "index"],['class'=>'btn btn-primary'])?>

		<?php else: ?>
			<table id="reqseltable" align="" class="table">
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
			<?php foreach ($reqlist as $req) : ?>

				<div class="row panel req_li list-panel">
					<a href="<?= $this->Url->build(["controller" => "request","action" => "edit",'id' => $req['id']])?>">
						<div id="rtitle" class="col-md-6">
							<?php echo $req['title']?>
						</div>
						<div id="rfaci_name" class="col-md-6">
							<p><?php echo $req['facilities']['name']?></p>
						</div>
					</a>
				</div>

			<?php endforeach; ?>
			<?= $this->Html->link('戻る',["controller" => "Request","action" => "index"],['class'=>'btn btn-primary'])?>
			<?= $this->Html->link('トップへ',["controller" => "TopPage","action" => "index"],['class'=>'btn btn-primary'])?>
		<?php endif; ?>
	</div>
</div>
