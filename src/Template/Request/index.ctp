
<?php
	$this->start('script');
		echo $this->Html->script('/private/js/request/request.js');
	$this->end();

	$this->start('css');
		echo $this->Html->css('/private/css/kota/request.css');
	$this->end();
?>





<div class="col-md-offset-2 col-md-8">
	<form class="" action="" method="GET" onsubmit="doSomething();return false;">
		<div class="row center">
			<input type="text" name="dummy" style="display:none;">
			<input type="text" id="fsearch" name="search" value=""/><button type="button" id="searchbutton" name="sbutton" class="submit-button">検索</button>
		</form>
		<h2>依頼先一覧<h2>
			<table id="facitable" align="center" border="3" >
				<thead>
					<tr>
						<th>施設名</th>
						<th>所在地</th>
					</tr>
				</thead>
				<?php foreach ($facilities as $facility) : ?>
				<tbody>
					<tr>
						<form action="/silver/request/create" method="GET" >
							<input type=hidden name=facility_id value=<?php echo $facility['id']?>>
							<input type=hidden name=facility_name value=<?php echo $facility['name']?>>
							<input type=hidden name=facility_address value=<?php echo $facility['address']?>>
						<td id="fname">
									<button type="submit" class="submit-button"><?php echo $facility['name']?></button>
						</form>
						</td>
						<td id="faddress">
							<?php echo $facility['address']?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="">

		</div>

</div>
