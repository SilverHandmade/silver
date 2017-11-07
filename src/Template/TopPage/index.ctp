<?= $this->Html->css('/private/css/TopPage/index.css'); ?>

<h3>〆切マジか</h3>
<div id="Carousel" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<?php for($i = 0; $i < 3; $i++): ?>
				<div class="col-md-4">
					<div id="panel">
						<a href="/silver"><?= $i;?>詳細 >></a>
					</div>
				</div>
			<?php endfor; ?>
		</div>
		<div class="item">
			<?php for($i = 3; $i < 6; $i++): ?>
				<div class="col-md-4">
					<div id="panel">
						<a href="/silver"><?= $i;?>詳細 >></a>
					</div>
				</div>
			<?php endfor; ?>
		</div>
		<div class="item">
			<?php for($i = 6; $i < 9; $i++): ?>
				<div class="col-md-4">
					<div id="panel">
						<a href="/silver"><?= $i;?>詳細 >></a>
					</div>
				</div>
			<?php endfor; ?>
		</div>
	</div>
	<a class="left carousel-control" href="#Carousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">前へ</span>
	</a>
	<a class="right carousel-control" href="#Carousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">次へ</span>
	</a>
</div>
