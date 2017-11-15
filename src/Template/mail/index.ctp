<?php $this->start('css'); ?>
	<?= $this->Html->css('/private/css/kota/mail.css') ?>
<?php $this->end(); ?>

<script>

$(function(){
	$('#cc').click(function() {
		$('#Cc').show();
	});
});

$(function(){
	$('#bcc').click(function() {
		$('#Bcc').show();
	});
});

</script>
<div class="col-md-offset-2 col-md-8">
	<div class="row">
		<table>
			<tbody>
				<tr>
					<td>
						<form class="" action="index.html" method="post">
							<table class="table">
								<tr>
									<td width="20%">
										<span aria-label="To" tabindex="1" role="link">To</span>
									</td>
									<td>
										<input type="email" aria-hidden="true">
									</td>
								</tr>
								<tr>
									<td width="20%">
										<div class="" id="cc">
											<span aria-label="Cc" tabindex="1" role="link">Cc</span>
										</div>
									</td>
									<td>
										<input type="email" aria-hidden="true" style="display:none" id="Cc">
									</td>
								</tr>
								<tr>
									<td width="20%">
										<div class="" id="bcc">
											<span aria-label="Bcc" tabindex="1" role="link">Bcc</span>
										</div>
									</td>
									<td>
										<input type="email" aria-hidden="true" style="display:none" id="Bcc">
									</td>
								</tr>
								<tr>

									<td colspan="2">
										<div class="">
											<input type="text" name="subjectbox" value="" placeholder="件名">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<textarea name="" rows="8" cols="80"></textarea>
									</td>
								</tr>
								<tr>
									<td>
										<button type="submit" name="transmission">送信</button>
									</td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
