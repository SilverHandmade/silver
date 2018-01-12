<select name="facilities" class="full">
	<?php foreach ($facilitiesArray as $value): ?>
		<option value="<?= $value['id'] ?>" <?= $value['id'] == $FacilityId?'selected':'';?>><?= $value['name'] ?></option>
	<?php endforeach; ?>
</select>
