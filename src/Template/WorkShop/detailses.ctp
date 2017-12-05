<div　class="row">
	<h2>詳細画面</h2>
	<table id="detailtbl" align="" class="table">
		<form action="" method="POST">
			
				<?php foreach ($pdt as $key) : ?>
					<tr align="center">

						<td colspan="3"><div align="center"><p><b>手順<?php echo $key['ren'] + 1 ?></b></p></div>
						<div align="center"><img src="<?= $this->Url->image('workshop/'.$key['photo_url'])?>" width="500" height="325"></div>
						<div align="center"><p><?php echo $key['description'] ?></p></div>

					</td>

			</tr>
		<?php endforeach; ?>

		</form>
	</table>
</div>
