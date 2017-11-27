<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();
?>




<div class="col-md-offset-2 col-md-8">
	<div class="row center">
		<h2>修正依頼選択<h2>
			<input type="text" name="dummy" style="display:none;">
		<form class="" action="" method="GET" onsubmit="doSomething();return false;">
			<input type="text" id="rsearch" name="search" value=""/><button type="button" id="Reqsearchbutton" name="sbutton" class="submit-button">検索</button>
		</form>


		<?php if ($reqlist == NULL): ?>
			<br>
			<h>編集可能な依頼がありません。</h>
			<br>
			<button type="button" class="button" onclick="location.href='/silver/'">戻る</button>
		<?php else: ?>
			<table id="reqseltable" align="" class="table">
				<thead>
					<tr>
						<th>件名</th>
						<th>依頼先施設名</th>
					</tr>
				</thead>

			<?php foreach ($reqlist as $req) : ?>

			<tbody>
				<tr>
					<form action="/silver/request/edit" method="POST" >
						<input type=hidden name=selrequest_id value=<?php echo $req['id']?>>
						<input type=hidden name=selrequest_saki_id value=<?php echo $req['F_saki_id']?>>
						<td id="rtitle">
							<button type="submit" class="submit-button"><?php echo $req['title']?></button>
						</td>
						<td id="rfaci_name">
							<p><?php echo $req['facilities']['name']?></p>
						</td>

					</form>
				</tr>

			<?php endforeach; ?>

			</tbody>
		</table>
		<?php endif; ?>
	</div>
</div>
