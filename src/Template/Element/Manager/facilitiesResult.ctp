<div class="row" id="modePanel">
	<?php foreach ($facilities as $key): ?>
		<div class="col-md-3">
			<div class="panel">
				<a href="<?= $this->Url->build(["controller" => "manager","action" => "FacilityDetail", 'id' => $key['id']])?>">
					<div class="row">
						<div class="col-md-12">
							<ul class="list-group">
								<li class="list-group-item">
									<h3><?= $key['name'];?></h3>
								</li>
								<li class="list-group-item">
									<?= $key['address'];?>
								</li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 right">
							<button class="btn btn-link" type="button">詳細 >></button>
						</div>
					</div>
				</a>
			</div>
		</div>
	<?php endforeach; ?>
</div>
