<div class="col-md-3">
	<div class="panel">
		<a href="<?= $this->Url->build(["controller" => "request","action" => "detail", 'id' => $key['id']])?>">
			<table class="table">
				<tr>
					<td><h3><?= $key['title'];?></h3></td>
				</tr>
				<tr>
					<td>
						<div><?= $key->facility['name'];?></div>
					</td>
				</tr>
				<tr>
					<td>
						<div><?= $key['To_date'];?>〆切!</div>
					</td>
				</tr>
			</table>

			<div class="row">
				<div class="col-md-12 right">
					<a href="<?= $this->Url->build(["controller" => "request","action" => "detail", 'id' => $key['id']])?>">詳細 >></a>
				</div>
			</div>
		</a>
	</div>
</div>
