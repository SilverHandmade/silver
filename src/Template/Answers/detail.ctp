
<?php
	$this->start('script');
		echo $this->Html->script('/private/js/answer/answer.js');
	$this->end();
?>

<table id="detailtbl" align="" class="table">
	<form action="" method="POST" >



		<tr>
			<td><p>タイトル：</p></td>
				<td><p><?php echo $detailId[0]['title'] ?></p></td>
		</tr>
		<tr>
			<td><p>内容：</p></td>
			<td><p><?php echo $detailId[0]['content'] ?></p></td>
		</tr>
		<tr>
			<td><p>投稿日：</p></td>
			<td><p><?php echo $detailId[0]['Postdate'] ?></p></td>
		</tr>

</table>

<table>
	<tr>
		<input type="text" id="answertxt" value="">
		<input type="button" id="answerbtn" value="回答する">
	</tr>
</table>

<?php if ($_SESSION['Auth']['User']['id'] == $detailId[0]['user_id']): ?>
	<button type="submit" class="button" name="edit">編集</button>
<?php else: ?>
	<button type="button" class="button" onclick="location.href='/silver/answers'">トップへ</button>
<?php endif; ?>

<table id="appendtable">

</table>
