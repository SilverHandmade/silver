<form action="" method="post">
	<table border>
		<tr>
			<td width=150 height=50>氏名</td>
			<td width=250 height=50	value=""><?= $_POST['name']; ?></td>
			<input type="hidden" name="name" value="<?= $_POST['name']; ?>">
		</tr>

		<tr>
			<td	width=150 height=50>フリガナ</td>
			<td width=250 height=50><?= $_POST['hurigana']; ?></td>
			<input type="hidden" name="hurigana" value="<?= $_POST['hurigana']; ?>">
		</tr>

		<tr>
			<td width=150 height=50>施設分類</td>
			<td width=250>
				<?php if ($_POST['fClassId'] == 1): ?>
					保育園
				<?php elseif ($_POST['fClassId'] ==9): ?>
					管理者
				<?php else: ?>
					介護施設
				<?php endif; ?>
			</td>
			<input type="hidden" name="fClassId" value="<?= $_POST['fClassId'] ?>">
		</tr>

		<tr>
			<td width=150>施設名</td>
			<td width=250 height=50><?= $fnamearray['name']; ?></td>
		</tr>

		<tr>
			<td width=150>メールアドレス</td>
			<td width=250 height=50><?= $_POST['email']; ?></td>
			<input type="hidden" name="email" value="<?= $_POST['email']; ?>">
		</tr>

		<tr>
			<td width=150>パスワード</td>
			<td width=250 height=50>
			<?php $str2 = str_repeat('*', strlen($_POST['password']));echo $str2?></td>
			<input type="hidden" name="password" value="<?= $_POST['password'] ?>">
		</tr>

	</table>
	<input type="hidden" name="facilities" value="<?= $_POST['facilities']?>">
	<input type="hidden" name="flg" value="true">
	<button type="submit" name="" value="" class="btn btn-success">確定</button>
</form>
