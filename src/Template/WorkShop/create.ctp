<div>
	<h1>ワークショップ作成</h1>
	<form action="" method="post">
		<div class="form-group">
			<label for="title">タイトル</label>
			<input class="form-control" type="text" name="" id="title">
		</div>
		<div class="form-group" id="plus">
			<div class="row">
				<div class="col-md-3">
					<div class="div-btn">
						<input type="file" class="input-file none file">
						<button type="button" name="" id="upload">画像選択</button>
					</div>
					<span id="fake_input_file">NOT FILE</span>
				</div>
				<div class="col-md-9">
					<input class="form-control" type="text">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-default" type="button" id="add">
					<span class="glyphicon glyphicon-plus-sign"></span>
				</button>
			</div>
		</div>
		<div class="row button">
			<button type="submit" name="button">送信</button>
			<button type="button" name="search-back" id="back">検索画面へ</button>
		</div>
	</form>

	 <div class="" id="linkTo">
	 	<?= $this->Html->link(">>検索画面へ",['controller' => 'workshop', "action" => "index"]);?>
	 </div>

	 <?php
 	 	$this->start('script');
 		echo $this->Html->script('/private/js/workshop/workshop.js');
 		$this->end();
 	 ?>
</div>
