<?php $this->start('css') ?>
	<?= $this->Html->css('/private/css/manager/manager.css') ?>
<?php $this->end() ?>
<?php $this->start('script') ?>
<?php $this->end() ?>

<div class="col-md-offset-1 col-md-10">
	<div class="row right">
		<?= $this->Html->link('戻る',['controller' => 'manager', 'action' => 'mails'], ['class' => 'btn btn-primary']);?>	
	</div>
	<div class="row">
		<div class="col-md-12">
			<p>送信日<?= date('Y年n月j日 H時i分', strtotime($mail['transmit']));?></p>
			<h3><?= $mail['title']?></h3>
			<p><?= $mail['questcont']?></p>
			<form class="form" action="index.html" method="post">
				<label for="InputTextarea">返信</label>
				<textarea class="form-control" id="InputTextarea" placeholder="返信内容を入力して下さい。"></textarea>
				<div class="row right">
					<button type="submit" class="btn btn-success">送信</button>
				</div>
			</form>
		</div>
	</div>
</div>
