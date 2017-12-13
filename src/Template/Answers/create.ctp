<?php
	$this->start('script');
		echo $this->Html->script('/private/js/answer/answer.js');
	$this->end();
?>
<div id="createtbl" class="">
	<form action="" method="POST" >
		<div>
			<div>
				<p>タイトル：</p>
			</div>
			<div>
				<input type="text" name="titletxt" value="" class="form-control">
			</div>
		</div>
		<div>
			<div>
				<p>内容：</p>
			</div>
			<div>
				<textarea name="textarea" rows="6" cols="80" class="tarea form-control" placeholder="内容入力してね！！"></textarea>
			</div>
		</div>
		<div class="">
			<input type="hidden" name="flg" value="true">
			<button type="submit" name="Completebtn" id="completebtn" class="btn btn-success">完了</button>
		</div>
	</form>
</div>
