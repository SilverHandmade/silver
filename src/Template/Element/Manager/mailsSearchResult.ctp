<div class="row" id="videoList">
	<?php foreach ($mails as $key): ?>
		<div class="col-md-12">
			<div class="panel">
				<a href="<?= $this->Url->build(["controller" => "video","action" => "view", 'id' => $key['id']])?>">
					<div class="row">
						<div class="col-md-12">
							送信日:<?= date('Y年n月j日 H時i分', strtotime($key['Postdate']));?>
						</div>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<h3><?= $key['title']; ?></h3>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	<?php endforeach; ?>
</div>
