<div class="row" id="modeList">
	<?php foreach ($users as $key): ?>
		<div class="col-md-12">
			<div class="panel">
				<a href="<?= $this->Url->build(["controller" => "manager", "action" => "usreDetail", 'id' => $key['id']])?>">
					<div class="row">
						<div class="col-md-12">
							登録日:<?= date('Y年n月j日 H時i分', strtotime($key['Registdate']));?>
						</div>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-4">
									<h3><?= $key['name']; ?></h3>
								</div>
								<div class="col-md-8">
									<?= $key->Facilities['name'];?>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<div class="row" id="modePanel">
	<?php foreach ($users as $key): ?>
		<div class="col-md-3">
			<div class="panel">
				<a href="<?= $this->Url->build(["controller" => "manager","action" => "usreDetail", 'id' => $key['id']])?>">
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