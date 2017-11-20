<?php $this->start('css'); ?>
	<?= $this->Html->css('/private/css/kota/mail.css') ?>
<?php $this->end(); ?>

<script>

$(function(){
	$('#cc').click(function() {
		$('#Cc').toggle();
	});
});

$(function(){
	$('#bcc').click(function() {
		$('#Bcc').toggle();
	});
});

</script>
<div class="col-md-offset-2 col-md-8">
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
					<td colspan="2">
						<textarea name="" rows="8" cols="80"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<button type="submit" name="transmission">送信</button>
					</td>
				</tr>
			<!-- </table> -->
			<input type="hidden" name="questionid" value="">
			<input type="hidden" name="userid" value="">
			<input type="hidden" name="questiondate" value="">
		</form>
	</div>
</div>
