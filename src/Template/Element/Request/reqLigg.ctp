<?php foreach ($reqs as $req) : ?>
	<div class="row panel list-panel">
		<a href="<?= $this->Url->build(["controller" => "request","action" => "detail",'id' => $req['id']])?>">
			<div id="rtitle" class="col-md-4">
				<?= $req['title'];?>
			</div>
			<div id="rfaci_name" class="col-md-6">
				<p><?= $req['facilities']['name'];?></p>
			</div>
			<div id="req_state" class="col-md-2">
				<?php if ($req['ju_flg'] != NULL): ?>
					<p class="p-color">受注中</p>
				<?php endif; ?>
				<?php if ($req['ju_flg'] == NULL): ?>
					<p>受注可能</p>
				<?php endif; ?>
			</div>
		</a>
	</div>
<?php endforeach; ?>
