<div　class="row">
	<h2>詳細画面</h2>
	<table id="detailtbl" align="" class="table">
		<form action="" method="POST" >
			<?php if ($pdt[0]['product_id'] != ""): ?>
			<tr>
				<th class="center"><p>画像：</p></th>
				<td><p><?php echo $pdt[0]['photo_url'] ?></p></td>
			</tr>
				<tr>
					<th class="center"><p>説明：</p></th>
					<td><p><?php echo $pdt[0]['description'] ?></p></td>
				</tr>
			<?php endif; ?>
		</form>
	</table>
</div>
