<?php
	$this->start('css');
	echo $this->Html->css('/private/css/kota/answers.css');
	$this->end();

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
		<input type="submit" id="answerbtn" value="回答する">
	</tr>
</table>

<?php if ($_SESSION['Auth']['User']['id'] == $detailId[0]['user_id']): ?>
	<button type="submit" class="button" name="edit">編集</button>
<?php else: ?>
	<button type="button" class="button" onclick="location.href='/silver/answers'">トップへ</button>
<?php endif; ?>

<table id="appendtable">

</table>

<table id="sample1_table">
    <tr>
		<?php foreach ($witmesArray as $witmesdiv): ?>
			<div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
				<?= $witmesdiv['message'];?>
				<br><br>
				<?= $witmesdiv['transmit'] ?>
			</div>
		<?php endforeach; ?>
		<!-- <td nowrap>
			<input type="button" id="editbtn" value="行削除"onclick="deleteRow(this)" />
		</td> -->
    </tr>
</table>
