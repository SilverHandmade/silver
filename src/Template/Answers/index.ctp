<?php
	$this->start('script');
		echo $this->Html->script('/private/js/answer/answer.js');
	$this->end();

	$this->start('css');
		echo $this->Html->css('/private/css/kota/request.css');
	$this->end();

?>

<form class="" id="ansForm" method="post">
	<div class="">
		<br><br><br>
		<input type="text" id="indextxt" value="">
		<input type="text" name="dummy" style="display:none;">
		<input type="button" id="indexbtn" value="検索" class="btn btn-success">

	</div>
</form>
<br><br>
<table id="reqseltable" align="" class="table">
	<thead>
		<tr>
			<th>タイトル</th>
			<th>内容</th>
			<th>投稿日</th>
		</tr>
	</thead>

<?php foreach ($witsesArray as $witseslist) {?>
<tbody>
	<tr class="panel">
		<td>
			<a href="<?= $this->Url->build(["controller" => "answers","action" => "detail",'id' => $witseslist['id']])?>"><?php echo $witseslist['name']?>
				<div id="wtitle">
					<?= $witseslist['title'];?>
				</div>
			</td>
				<td>
				<div id="wcontent">
					<?= $witseslist['content'];?>
				</div>
				</td>
				<td>
				<div id="wdate">
					<?= $witseslist['Postdate'];?>
				</div>
				</td>
			</a>
		</td>
	</tr>
</tbody>
<?php } ?>
<input type="button" onclick="location.href='answers/create'" name="" value="投稿" class="btn btn-primary">
