<?php $this->start('css') ?>
   <?= $this->Html->css('/private/css/TopPage/TopPage.css') ?>
<?php $this->end() ?>

<div class="col-md-12">
	<h2>新着お問い合わせ</h2>
	<div class="row">
		<?php foreach ($mail as $key): ?>
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
										<?= date('Y年n月j日 H時i分', strtotime($key['Postdate']));?>
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
			<?= $this->Html->link('施設一覧へ >>',['controller' => 'manager', 'action' => 'facilities']);?>
		</div>
    </div>

	<h2>ユーザー</h2>
	<div class="row">
		<?php foreach ($User as $key): ?>
			<div class="col-md-3">
				<div class="panel">
					<a href="<?= $this->Url->build(["controller" => "manager","action" => "user", 'id' => $key['id']])?>">
						<div class="row">
							<div class="col-md-12">
								<ul class="list-group">
									<li class="list-group-item">
										<h3><?= $key['name'];?></h3>
									</li>
									<li class="list-group-item">
										<?= $key['email'];?>
									</li>
									<li class="list-group-item">
										<?= $key->Facilities['name'];?>
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
 		   <?= $this->Html->link('施設一覧へ >>',['controller' => 'manager', 'action' => 'users']);?>
 	   </div>
    </div>
</div>
