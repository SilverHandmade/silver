<?php $this->start('css'); ?>
	<?= $this->Html->css('/private/css/kota/mail.css') ?>
<?php $this->end(); ?>

<script>
$(function(){
	$('#cc').click(function() {
		$('#Cc').toggle();
	});
});
</script>
<div class="col-md-offset-2 col-md-8">
	<p class="title">お問い合わせ</p>
	<div class="row">
		<form class="" action="mail" method="post">
			<table class="table">
				<tr>
					<div class="form-group">
						<td colspan="2">
							<div>
								<input type="text" name="subjectbox" value="" placeholder="件名" class="input-text form-control">
							</div>
						</td>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<td colspan="2">
							<textarea name="text" rows="8" cols="60" class="textarea form-control"></textarea>
						</td>
					</div>
				</tr>
				<tr>
					<td>
						<button type="submit" name="transmission" class="success">送信</button>
						<input type="hidden" name="flg" value="true">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
