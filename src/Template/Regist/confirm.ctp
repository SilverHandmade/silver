<form	action="" method="post">

	<table border>
		<tr>
			<td width=150 height=50>氏名</td>
			<td width=250 height=50	value=""><?php echo $_POST['name']; ?></td>
			<input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">

		</tr>

		<tr>
			<td	width=150 height=50>フリガナ</td>
			<td width=250 height=50><?php echo $_POST['hurigana']; ?></td>
			<input type="hidden" name="hurigana" value="<?php echo $_POST['hurigana']; ?>">

		</tr>

		<tr>
			<td width=150 height=50>施設分類</td>
			<td width=250>
				<?php switch ($_POST['fClassId']) {
					case '1':?>
						保育園
						<?php	break;
					default:?>
						介護施設
						<?php	break;
				} ?>
			</td>
			<input type="hidden" name="fClassId" value="<?php echo $_POST['fClassId'] ?>">
		</tr>

		<tr>
			<td width=150>施設名</td>
			<td width=250 height=50><?php echo $fnamearray[0]['name']; ?></td>

		</tr>

		<tr>
			<td width=150>メールアドレス</td>
			<td width=250 height=50><?php echo $_POST['email']; ?></td>
			<input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">


		</tr>

		<tr>
			<td width=150>パスワード</td>
			<td width=250 height=50>
			<?php	$str2 = str_repeat('*', strlen($_POST['password']));echo $str2?></td>
			<input type="hidden" name="password" value="<?php $str2 = str_repeat('*', strlen($_POST['password']));echo $str2 ?>">

		</tr>

	</table>
	<input type="hidden" name="facilities" value="<?= $_POST['facilities']?>">
	<input type="hidden" name="flg" value="true">
	<input type="submit" name="" value="確定">
</form>
