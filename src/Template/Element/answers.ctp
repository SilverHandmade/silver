<?php foreach ($witsesArray as $witseslist) {?>
	<div class="panel row">
		<a href="<?= $this->Url->build(["controller" => "answers","action" => "detail",'id' => $witseslist['id']])?>">
			<div id="wtitle" class="col-md-3">
				<p>
					<?= $witseslist['title'];?>
				</p>
			</div>
			<div id="wcontent" class="col-md-6">
				<p>
					<?= $witseslist['content'];?>
				</p>
			</div>
			<div id="wdate" class="col-md-3">
				<p>
					<?= date('Y年m月d日', strtotime($witseslist['Postdate']));?>
				</p>
			</div>
		</a>
	</div>
<?php } ?>
