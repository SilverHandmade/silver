<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();
?>




<div class="col-md-offset-2 col-md-8">
	<div class="row center">
		<h2>依頼一覧<h2>
		<form class="" action="" method="GET" onsubmit="doSomething();return false;">
			<input type="text" name="dummy" style="display:none;">
			<input type="text" id="rsearch" name="search" value=""/><button type="button" id="Reqsearchbutton" name="sbutton" class="submit-button">検索</button>
		</form>

		<table id="reqtable" align="" class="table">
			<thead>
				<tr>
					<th>件名</th>
					<th>依頼元施設名</th>

				</tr>
			</thead>
			<?php foreach ($reqs as $req) : ?>

			<tbody>
				<tr>
					<form action="/silver/request/detail" method="POST" >
						<input type=hidden name=request_id value=<?php echo $req['id']?>>
						<input type=hidden name=request_moto_id value=<?php echo $req['F_moto_id']?>>
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
	</div>
</div>
