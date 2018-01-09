<div class="row" id="modePanel">
	<?php foreach ($mails as $key): ?>
		<div class="col-md-3">
			<div class="panel">
				<a href="<?= $this->Url->build(["controller" => "manager","action" => "MailDetail", 'id' => $key['id']])?>">
					<div class="row">
						<div class="col-md-12">
							<ul class="list-group">
								<li class="list-group-item">
									<h3><?= $key['title'];?></h3>
								</li>
								<li class="list-group-item">
									<?= $key->Users['name'];?>
								</li>
								<li class="list-group-item">
									<?= $key['questcont'];?>
								</li>
								<li class="list-group-item">
									<?= date('Y年n月j日 H時i分', strtotime($key['transmit']));?>
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
