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
		<input type="button" id="answerbtn" value="回答する" onclick="insertRow('sample1_table')">
	</tr>
</table>

<?php if ($_SESSION['Auth']['User']['id'] == $detailId[0]['user_id']): ?>
	<button type="submit" class="button" name="edit">編集</button>
<?php else: ?>
	<button type="button" class="button" onclick="location.href='/silver/answers'">トップへ</button>
<?php endif; ?>

<table id="appendtable">

</table>
<script>
/**
 * 行追加
 */
function insertRow(id) {
    // テーブル取得
    var table = document.getElementById(id);
    // 行を行末に追加
    var row = table.insertRow(-1);
    // セルの挿入
    var cell1 = row.insertCell(-1);
    var cell2 = row.insertCell(-1);
    var cell3 = row.insertCell(-1);
    // ボタン用 HTML
    var button = '<input type="button" id="editbtn" value="行削除" onclick="deleteRow(this)" />';

    // 行数取得
    var row_len = table.rows.length;

    // セルの内容入力
    cell1.innerHTML = row_len + "-" + 1;
    cell2.innerHTML = row_len + "-" + 2;
	cell3.innerHTML = button;
}
function deleteRow(obj) {
    // 削除ボタンを押下された行を取得
    tr = obj.parentNode.parentNode;
    // trのインデックスを取得して行を削除する
    tr.parentNode.deleteRow(tr.sectionRowIndex);
}

</script>
<table id="sample1_table">
    <tr>
        <td nowrap>1-1</td>
        <td nowrap>1-2</td>
		<td nowrap>
			<input type="button" id="editbtn" value="行削除"onclick="deleteRow(this)" />
		</td>
    </tr>
</table>

<h2>テスト</h2>
