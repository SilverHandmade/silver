<?php foreach ($facilities as $facility) : ?>
	<div class="row panel list-panel">
		<a href="<?= $this->Url->build(["controller" => "request","action" => "create",'id' => $facility['id']])?>">
			<div id="fname"class="col-md-6">
				<?php echo $facility['name']?>
			</div>
			<div id="faddress" align="justify col-md-6">
				<?php echo $facility['address']?>
			</div>
		</a>
	</div>
<?php endforeach; ?>
