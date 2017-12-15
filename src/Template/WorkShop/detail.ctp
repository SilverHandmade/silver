<div class="row">
	<h2>詳細画面</h2>
	<table id="detailtbl" align="" class="table">
		<?php if ($user_faci[0]['facility_classes_id'] == 1): ?>

		<tr>
			<?= $this->Html->link(">>戻る",['controller' => 'WorkShop', "action" => "index"]);?>
		</tr>
		<tr>
			<?= $this->Html->link(">>トップページへ",['controller' => 'TopPage', "action" => "index"]);?>
		</tr>
		<div class="col-md-12">
			<?= $this->Html->link(">>ワークショップ編集画面へ",['controller' => 'WorkShop', "action" => "select"]);?>
		</div>
		<?php foreach ($detailses as $key) : ?>
			<tr align="center">
				<td colspan="3"><div align="center">
					<p>
						<b>手順<?php echo $key['ren'] + 1 ?></b>
					</p>
					</div>
					<div align="center">
						<?php if (!empty($key['photo_url']) && file_exists('img/workshop/'.$key['photo_url'])): ?>
							<img src="<?= $this->Url->image('workshop/'.$key['photo_url']) ?>"width="500" height="325">
						<?php else: ?>
							<img src="<?= $this->Url->image('no_image.png') ?>"width="500" height="325">
						<?php endif; ?>					</div>
					<div align="center">
						<p><?php echo $key['description'] ?></p>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>

	<?php else: ?>
		<tr>
			<?= $this->Html->link(">>戻る",['controller' => 'WorkShop', "action" => "index"]);?>
		</tr>
		<tr>
			<?= $this->Html->link(">>トップページへ",['controller' => 'TopPage', "action" => "index"]);?>
		</tr>

		<?php foreach ($detailses as $key) : ?>
			<tr align="center">
				<td colspan="3"><div align="center">
					<p>
						<b>手順<?php echo $key['ren'] + 1 ?></b>
					</p>
					</div>
					<div align="center">
						<img src="<?= $this->Url->image('workshop/'.$key['photo_url'])?>" width="500" height="325">
					</div>
					<div align="center">
						<p><?php echo $key['description'] ?></p>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
	<?php endif; ?>
	</table>
</div>
