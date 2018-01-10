<select name="facilities">
	<?php foreach ($facilitiesArray as $value): ?>
		<option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
	<?php endforeach; ?>
</select>
