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
	<p class="title">お問い合わせ</p>
	<div class="row">
		<form class="" action="index.html" method="post">
			<table class="table">
				<tr>
					<div class="form-group">
						<td>
							<div>To</div>
						</td>
						<td>
							<input type="email" aria-hidden="true" class="form-control">
						</td>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<td>
							<div id="cc">Cc</div>
						</td>
						<td>
							<input type="email" aria-hidden="true" style="display:none" id="Cc" class="form-control">
						</td>
					</div>
				</tr>
				<tr>
					<div class="form-group">
						<td>
							<div class="" id="bcc">Bcc</div>
						</td>
						<td>
							<input type="email" aria-hidden="true" style="display:none" id="Bcc" class="form-control">
						</td>
					</div>
				</tr>
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
							<textarea name="text" rows="8" cols="80" class="form-control"></textarea>
						</td>
					</div>
				</tr>
				<tr>
					<td>
						<button type="submit" name="transmission">送信</button>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
