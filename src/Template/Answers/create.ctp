<?php
	$this->start('script');
		echo $this->Html->script('/private/js/answer/answer.js');
	$this->end();
?>

<table id="createtbl" align="" class="table">
	<form action="" method="POST" >
		<tr>
			<td><p>タイトル：</p></td>
			<td><input type="text" name="titletxt" value="" required></td>
		</tr>
		<tr>
			<td><p>内容：</p></td>
			<td><input type="text" name="contenttxt" value="" required></td>
		</tr>
</table>
	<input type="hidden" name="flg" value="true">
	<input type="submit" name="Completebtn" id="completebtn" value="完了" class="btn btn-success">
	</form>
