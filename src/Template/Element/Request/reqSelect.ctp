<?php foreach ($reqlist as $req) : ?>

	<div class="row panel req_li list-panel">
		<a href="<?= $this->Url->build(["controller" => "request","action" => "edit",'id' => $req['id']])?>">
			<div id="rtitle" class="col-md-6">
				<?php echo $req['title']?>
			</div>
			<div id="rfaci_name" class="col-md-6">
				<p><?php echo $req['facilities']['name']?></p>
			</div>
		</a>
	</div>

<?php endforeach; ?>
