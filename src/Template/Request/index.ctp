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
		<form class="" action="" method="GET" onsubmit="doSomething();return false;">
			<input type="text" name="dummy" style="display:none;"/>
		<?php if ($user_faci[0]['facility_classes_id'] == 1): ?>
			<input type="text" id="fsearch" name="search" value="" class="search"/><button type="button" id="searchbutton" name="sbutton" class="submit-button">検索</button>
		</form>

		<h2>依頼先一覧<h2>
		<table id="facitable" class="table">
			<thead>
				<tr>
					<th>施設名</th>
					<th>所在地</th>
				</tr>
			</thead>

			<!-- <tbody>
				<tr>


					<td id="faddress" align="justify">

					</td>
				</tr>
				<?php endforeach; ?>

			</tbody>
		</table>

		<br><br>
				<button type="button" class="button" onclick="location.href='/silver/request/select'">依頼編集・取り消し画面はこちら</button>
			<?php else: ?>
				<h2>介護施設の方は依頼の作成は出来ません<h2>
				<button type="button" class="button" onclick="location.href='/silver/'">トップへ</button>
			<?php endif; ?>
	</div>
</div>
