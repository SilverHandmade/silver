<?php $this->start('css') ?>
   <?= $this->Html->css('/private/css/TopPage/TopPage.css') ?>
<?php $this->end() ?>

<div class="col-md-12">
	<h2>新着お問い合わせ</h2>
	<div class="row">
		<?php foreach ($mail as $key): ?>
			<div class="col-md-3">
				<div class="panel">
					<a href="<?= $this->Url->build(["controller" => "request","action" => "detail", 'id' => $key['id']])?>">
						<div class="row">
							<div class="col-md-12">
								<ul class="list-group">
									<li class="list-group-item">
										<h3><?= $key['title'];?></h3>
									</li>
									<li class="list-group-item">
										<?= $key->['user_id'];?>
									</li>
									<li class="list-group-item">
										<?= $key['To_date'];?>〆切!
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
	<div class="row right" id="linkTo">
		<div class="col-md-12">
			<?= $this->Html->link('お問い合わせ一覧へ >>',['controller' => 'manager', 'action' => 'mails']);?>
		</div>
	</div>

	<h2>施設</h2>
    <div class="row">
 	   <?php foreach ($facility as $key): ?>
 		   <?= $this->element('TopPage/DeadlineRequest', ['key' => $key]);?>
 	   <?php endforeach; ?>
    </div>
    <div class="row right" id="linkTo">
 	   <div class="col-md-12">
 		   <?= $this->Html->link('施設一覧へ >>',['controller' => 'request', 'action' => 'lists']);?>
 	   </div>
    </div>
</div>
