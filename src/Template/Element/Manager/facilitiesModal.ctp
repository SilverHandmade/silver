<div class="modal fade" id="fModal<?= $key['id'];?>" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
				<h4 class="modal-title">施設情報編集</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form action="<?= $this->Url->build(["controller" => "manager","action" => "FacilityDetail", 'id' => $key['id']])?>" method="post" id="FChange<?= $key['id'];?>">
							<div>
								<label for="name" class="font-color">施設名</label>
								<input class="form-control" type="text" name="name" id="name" placeholder="施設名" value="<?= $key['name'];?>"/>
								<?php foreach ($fClassArray as $fClasskey => $value): ?>
									<span>
										<input type="radio" name="fClassId" class="radio" value="<?= $value['id'] ?>" <?= $value['id']==$key['facility_classes_id']?'checked':'';?> id="radio-<?= $key['id'].$value['id'] ?>">
										<label for="radio-<?= $key['id'].$value['id'] ?>"><?= $value['name'] ?></label>
									</span>
								<?php endforeach; ?>
							</div>
							<div>
								<label for="post" class="font-color">郵便番号</label>
								<div class="row">
									<div class="col-md-5">
										<input class="form-control" type="text" name="zip11" size="10" maxlength="8" placeholder="郵便番号" value="<?= $key['Post'];?>" onKeyUp="AjaxZip3.zip2addr(this,'','addr11','addr11');">
									</div>
								</div>
								<label for="address" class="font-color">住所</label>
								<input class="form-control" type="text" name="addr11" size="60" id="address" placeholder="住所" value="<?= $key['address'];?>">
							</div>
							<input type="hidden" name="Del_flg" value="<?= $key['Del_flg']?>">

							<div class="row">
								<div class="col-md-11 right">
									<button type="button" class="btn btn-danger fdelete <?= $key['Del_flg']?'active':'';?>" data-toggle="button" autocomplete="off">
										削除
									</button>
									<button type="submit" class="btn btn-success">更新</button>
								</div>
							</div>
							<div class="icon"><span></span></div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
			</div>
		</div>
	</div>
</div>
