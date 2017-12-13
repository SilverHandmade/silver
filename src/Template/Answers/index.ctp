<?php
	$this->start('script');
		echo $this->Html->script('/private/js/answer/answer.js');
	$this->end();

	$this->start('css');
		echo $this->Html->css('/private/css/answers/answers.css');
	$this->end();

?>

<form class="" id="ansForm" method="post">
	<div class="form-group">
		<div class="form-inline sear-lay">
			<input type="text" name="dummy" style="display:none;">
			<input type="text" id="indextxt" value="" class="ans-text form-control">
			<button type="button" id="indexbtn" class="btn btn-success">検索</button>
		</div>
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
