<div class="col-md-offset-2 col-md-8">
	<div class="row center">
		<h2>ワークショップ編集画面</h2>
		<form action=""method="post">
			<input type="text" name="S_text" id="select_t">
			<input type="button" name="S_button" id="select_t" value="検索">
		</form>

		<?= $this->Html->link(">>戻る",['controller' => 'WorkShop', "action" => "index"]);?>

			<?php foreach ($query as $key): ?>
				<div class="col-md-12">
					<div class = "row panel">
						<a href="<?= $this->Url->build(["controller" => "WorkShop","action" => "edit", 'id' => $key['id']])?>">
							<div class="col-md-3">
								<div align="center"><img src="<?= $this->Url->image('workshop/'.$key['midasi_url'])?>" width="500" height="325"></div>
							</div>
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-12">
										<h3><?=$key['name']?></h3>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
	</div>
</div>
