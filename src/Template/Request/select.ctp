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
		<h2>修正依頼選択<h2>
			<input type="text" name="dummy" style="display:none;">
		<!-- <form class="" action="" method="GET" onsubmit="doSomething();return false;"> -->
			<input type="text" id="rsearch" name="search" value="" class="search"/><button type="button" id="editReqbutton" name="sbutton" class="submit-button">検索</button>
		<!-- </form> -->

		<?php if ($reqlist == NULL): ?>
			<br>
			<h>編集可能な依頼がありません。</h>
			<br>
			<button type="button" class="button" onclick="location.href='/silver/'">トップへ</button>
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
				<div class="panel">
					<form action="/silver/request/edit" method="POST" id="panel">
						<input type="hidden" name="selrequest_id" value="<?= $req['id']?>">
						<input type="hidden" name="selrequest_saki_id" value="<?= $req['F_saki_id']?>">
						<button type="submit" class="submit row">
							<div id="rtitle" class="col-md-6">
								<?= $req['title']?>
							</div>
							<div id="rfaci_name" class="col-md-6">
								<p><?= $req['facilities']['name']?></p>
							</div>
						</button>
					</form>
				</div>
			<?php endforeach; ?>
			<button type="button" class="button" onclick="location.href='/silver/request/'">戻る</button>
			<br>
			<button type="button" class="button" onclick="location.href='/silver/'">トップへ</button>
		<?php endif; ?>
	</div>
</div>
