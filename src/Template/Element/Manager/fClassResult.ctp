<select name="facilities">
	<?php foreach ($facilitiesArray as $value): ?>
		<option value="<?= $value['id'] ?>" <?= $value['id'] == $user['facilities_id']?'selected':'';?>><?= $value['name'] ?></option>
	<?php endforeach; ?>
</select>
