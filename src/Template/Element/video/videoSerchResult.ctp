<div class="row modePanel">
	<?php $i = 0; foreach ($results as $key): ?>
		<div class="col-md-3">
			<div class="panel">
				<a href="<?= $this->Url->build(["controller" => "video","action" => "view", 'id' => $key['id']])?>">
					<?= date('Y年n月j日 H時i分', strtotime($key['contribution']));?>
					<img src="<?= $this->Url->image(file_exists($key['movie_url'])?$key['movie_url']:"no_image.png");?>">
					<h3><?=$key['title']?></h3>
				</a>
			</div>
		</div>
	<?php endforeach; ?>
</div>
