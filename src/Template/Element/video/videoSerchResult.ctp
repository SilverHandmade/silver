<div class="row" id="modeList">
	<?php foreach ($results as $key): ?>
		<div class="col-md-12">
			<div class="panel">
				<a href="<?= $this->Url->build(["controller" => "video","action" => "view", 'id' => $key['id']])?>">
					<div class="row">
						<div class="col-md-3">
							投稿日:<?= date('Y年n月j日 H時i分', strtotime($key['contribution']));?>
							<img src="<?= $this->Url->image(file_exists($key['movie_url'])?$key['movie_url']:"no_image.png");?>">
						</div>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-12">
									<h3><?= $key['title']; ?></h3>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p>
										<?= $key['description']; ?>
									</p>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<div id="modePanel" class="row">
	<?php $i = 0; foreach ($results as $key): ?>
		<div class="col-md-3">
			<div class="panel">
				<a href="<?= $this->Url->build(["controller" => "video","action" => "view", 'id' => $key['id']])?>">
					<?=$key['contribution']?>
					<img src="<?= $this->Url->image(file_exists($key['movie_url'])?$key['movie_url']:"no_image.png");?>">
					<h3><?=$key['title']?></h3>
				</a>
			</div>
		</div>
	<?php endforeach; ?>
</div>
