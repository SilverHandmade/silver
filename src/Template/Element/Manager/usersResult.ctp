<div class="row modePanel">
	<?php foreach ($users as $key): ?>
		<div class="col-md-3">
			<div class="panel <?= $key['Del_flg']?'deleted':'';?>">
				<a data-toggle="modal" data-target="#uModal<?= $key['id'];?>">
					<div class="row">
						<div class="col-md-12">
							<ul class="list-group">
								<li class="list-group-item">
									<h3><?= $key['name'];?></h3>
								</li>
								<li class="list-group-item">
									<?= $key['id'];?>
								</li>
								<li class="list-group-item">
									<?= $key['email'];?>
								</li>
								<li class="list-group-item">
									<?= $key->Facilities['name'];?>
								</li>
								<li class="list-group-item">
									<?= date('Y年n月j日 H時i分', strtotime($key['Registdate']));?>
								</li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 right">
							<button class="btn btn-link" type="button" >詳細 >></button>
						</div>
					</div>
				</a>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<?php foreach ($users as $key): ?>
	<?= $this->element('Manager/usersModal', ['key' => $key]);?>
<?php endforeach; ?>
