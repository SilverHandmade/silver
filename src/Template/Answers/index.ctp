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
		<input type="text" id="indextxt" value="" class="ans-text form-control">
		<input type="text" name="dummy" style="display:none;">
		<input type="button" id="indexbtn" value="検索" class="btn btn-success">

	</div>
</form>
<br><br>
<table id="reqseltable" align="" class="table row">
	<thead>
		<tr>
			<th class="col-md-3">タイトル</th>
			<th class="col-md-6">内容</th>
			<th class="col-md-3">投稿日</th>
		</tr>
	</thead>
</table>
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
					<?= $witseslist['Postdate'];?>
				</p>
			</div>
		</a>
	</div>
<?php } ?>
<?= $this->Html->link('投稿',['controller'=>'Answers','action'=>'create'],['class'=>'btn btn-primary']); ?>
