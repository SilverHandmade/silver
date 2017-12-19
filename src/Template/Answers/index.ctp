<?php
	$this->start('script');
		echo $this->Html->script('/private/js/answer/answer.js');
	$this->end();

	$this->start('css');
		echo $this->Html->css('/private/css/answers/answers.css');
	$this->end();

?>

<form class="" id="ansForm" action="" method="post">
	<div class="form-group">
		<div class="form-inline sear-lay search-inline">
			<input type="text" name="dummy" style="display:none;">
			<input type="text" name="indextxt" id="indextxt" value="" class="ans-text form-control">
			<button type="submit" id="indexbtn" class="btn btn-success">検索</button>
		</div>
	</div>
</form>
<br><br>
<table id="reqseltable" align="" class="none-table table row">
	<thead>
		<tr>
			<th class="col-md-3">タイトル</th>
			<th class="col-md-6">内容</th>
			<th class="col-md-3">投稿日</th>
		</tr>
	</thead>
</table>
<?= $this->element('answers') ?>
<?= $this->Html->link('投稿',['controller'=>'Answers','action'=>'create'],['class'=>'btn btn-primary']); ?>
