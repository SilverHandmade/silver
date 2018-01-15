<?php foreach ($reqs_hoiku as $req): ?>
	<div class="row panel list-panel">
		<a href="<?= $this->url->build(["controller" => "request","action" => "detail",'id' => $req['id']])?>">
			<div id="rtitle" class="col-md-4">
				<p><?php echo $req['title']?></p>
			</div>
			<div id="rfaci_name" class="col-md-7">
				<p class="left"><?php echo $req['facilities']['name']?></p>
			</div>
			<div id="req_state" class="col-md-1">
				<?php if ($req['ju_flg'] != NULL): ?>
					<p class="p-color">受注中</p>
				<?php else: ?>
					<p>依頼中</p>
				<?php endif; ?>
			</div>
		</a>
	</div>
<?php endforeach; ?>
