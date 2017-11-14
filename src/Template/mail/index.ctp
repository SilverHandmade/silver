<?php $this->start('css'); ?>
	<?= $this->Html->css('/private/css/kota/mail.css') ?>
	<?= $this->Html->css('/webroot/css/src/bootstrap.css')?>
	<?= $this->Html->css('mail.css') ?>
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
<div class="col-md-offset-2">
	<div class="row">
		<table>
			<tbody>
				<tr>
					<td>
						<form class="" action="index.html" method="post">
							<div class="row">
								<table>
									<tbody>
										<tr>
											<td>
												<div class="">
													<span aria-label="To" tabindex="1" role="link">To</span>
												</div>
											</td>
											<td>
												<input type="email" tabindex="-1" aria-hidden="true">
											</td>
										</tr>
										<tr>
											<td>
												<div class="" id="cc">
													<span aria-label="Cc" tabindex="1" role="link">Cc</span>
												</div>
											</td>
											<td>
												<div class="">
													<input type="email" tabindex="-1" aria-hidden="true" style="display:none" id="Cc">
												</div>
											</td>
										</tr>
											<td>
												<div class="" id="bcc">
													<span aria-label="Bcc" tabindex="1" role="link">Bcc</span>
												</div>
											</td>
											<td>
												<input type="email" tabindex="-1" aria-hidden="true" style="display:none" id="Bcc">
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<table>
								<tbody>
									<tr>
										<div class="">
											<input type="text" name="subjectbox" value="" placeholder="件名">
										</div>
									</tr>
									<tr>
										<td>
											<textarea name="" rows="8" cols="80"></textarea>
										</td>
									</tr>
								</tbody>
							</table>
							<table>
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
