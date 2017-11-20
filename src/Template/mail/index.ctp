<?php $this->start('css'); ?>
	<?= $this->Html->css('/private/css/kota/mail.css') ?>
<?php $this->end(); ?>

<script>

</script>
<div class="col-md-offset-2 col-md-8">
	<p class="title">お問い合わせ</p>
	<div class="row">
		<form class="" action="index.html" method="post">
			<table class="table">
				<tr>
					<div class="form-group">
						<td colspan="3">
							<div>
								<input type="text" name="subjectbox" value="" placeholder="件名" class="input-text form-control">
								<nobr>
									<span>
										※(40文字以内)
									</span>
								</nobr>
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
