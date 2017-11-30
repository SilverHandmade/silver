
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

<?php if ($_SESSION['Auth']['User']['facilities_id'] == $detailId[0]['user_id']): ?>
	<button type="submit" class="button" name="order">編集</button>
<?php else: ?>
	<button type="button" class="button" onclick="location.href='/silver/'">トップへ</button>
<?php endif; ?>
