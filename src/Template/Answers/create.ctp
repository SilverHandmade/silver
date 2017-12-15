<?php
	$this->start('script');
		echo $this->Html->script('/private/js/answer/answer.js');
	$this->end();

	$this->start('css');
		echo $this->Html->css('/private/css/answers/answers.css');
	$this->end();
?>
<div id="createtbl" class="col-md-offset-2 col-md-8 center">
	<h2>投稿</h2>
	<div class="row">
		<form action="" method="POST" >
			<div>
				<p class="font-p">タイトル</p>
				<input type="text" name="titletxt" value="" class="form-control">
			</div>
			<div>
				<p class="font-p">内容</p>
				<textarea name="textarea" rows="10" cols="80" class="tarea form-control" placeholder="内容入力してね！！"></textarea>
			</div>
			<div class="ans-btn">
				<input type="hidden" name="flg" value="true">
				<button type="submit" name="Completebtn" id="completebtn" class="btn btn-success">完了</button>
			</div>
		</form>
	</div>
</div>
