<div class="row" id="videoList">
	<?php foreach ($facilities as $key): ?>
		<div class="col-md-12">
			<div class="panel">
				<a href="<?= $this->Url->build(["controller" => "video","action" => "view", 'id' => $key['id']])?>">
					<div class="row">
						<div class="col-md-12">
							登録日:<?= date('Y年n月j日 H時i分', strtotime($key['Registdate']));?>
						</div>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<h3><?= $key['name']; ?></h3>
								</div>
								<div class="col-md-6">
									<?= $key['address']; ?>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	<?php endforeach; ?>
</div>
