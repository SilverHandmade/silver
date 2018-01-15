<?php
	$this->start('script');
		echo $this->Html->script('/private/js/answer/answer.js');
		echo $this->Html->script('/private/js/searchAjax.js');
	$this->end();

	$this->start('css');
		echo $this->Html->css('/private/css/answers/answers.css');
	$this->end();

?>

<form class="searchAjax" id="ansForm" action="" method="post">
	<div class="form-group">
		<div class="form-inline sear-lay search-inline">
			<input type="text" name="dummy" style="display:none;">
			<input type="text" name="indextxt" id="indextxt" value="" class="ans-text form-control">
			<button type="submit" id="indexbtn" class="btn btn-success media-btn">検索</button>
		</div>
		<div class="right q-create form-inline">
			<?= $this->Html->link('投稿',['controller'=>'Answers','action'=>'create'],['class'=>'btn btn-primary']); ?>
		</div>
	</div>
</form>
<table id="reqseltable" align="" class="none-table table row">
	<thead>
		<tr>
			<th class="col-md-3">タイトル</th>
			<th class="col-md-6">内容</th>
			<th class="col-md-3">投稿日</th>
		</tr>
	</thead>
</table>
<div id="searchAjaxResult">
	<?= $this->element('answers') ?>
</div>
