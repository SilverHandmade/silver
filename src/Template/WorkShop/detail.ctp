<?php



 ?>
<div class="col-md-offset-2 col-md-8">
	<div class="row">
		<div id="title">
			<h2>詳細画面</h2>
		</div>
		<div id="detailtbl" align="" class="">
			<div class="col-md-12 right">
				<?= $this->Html->link(">>ワークショップ編集画面へ",['controller' => 'WorkShop', "action" => "select"]);?>
			</div>
			<?php foreach ($detailses as $key) : ?>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<h3>手順<?php echo $key['ren'] + 1 ?></h3>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<img src="<?= $this->Url->image('workshop/'.$key['photo_url'])?>" class="img-size">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p><?php echo $key['description'] ?></p>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</table>
		<div class="row">
			<div class="col-md-12 right">
				<?= $this->Html->link("戻る",['controller' => 'WorkShop', "action" => "index"], ['class'=>'btn btn-primary']);?>
				<?= $this->Html->link("トップページへ",['controller' => 'TopPage', "action" => "index"], ['class'=>'btn btn-primary']);?>
			</div>
		</div>
	</div>
</div>
