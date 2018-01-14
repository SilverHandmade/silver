<div class="modal fade" id="uModal<?= $key['id'];?>" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
				<h4 class="modal-title">ユーザ情報編集</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form action="<?= $this->Url->build(["controller" => "manager","action" => "userDetail", 'id' => $key['id']])?>" method="post" id="UChange<?= $key['id'];?>">
							<p class="font-color">ID</p>
							<input type="text"name="id" value="<?= $key['id'] ?>" readonly class="form-control">

							<div class="username">
								<p class="font-color">氏名</p>
								<input type="text" id="username" name="name" value="<?= $key['name'] ?>" required class="form-control">
							</div>
							<div class="furigana">
								<p class="font-color">フリガナ</p>
								<input type="text" id="hurigana" name="hurigana" value="<?= $key['hurigana']?>"required class="form-control">
							</div>
							<div class="radio-layout">
								<?php foreach ($fClassArray as $value): ?>
									<span>
										<input type="radio" name="fClassId" class="radio" value="<?= $value['id'] ?>" <?= $value['id']==$key['facility_classes_id']?'checked':'';?> id="radio-<?= $value['id'] ?>">
										<label for="radio-<?= $value['id'] ?>"><?= $value['name'] ?></label>
									</span>
								<?php endforeach; ?>
							</div>
							<div class="pulldown facilityname">
								<p class="font-color">施設名</p>
								<div id="fClassResult">
									<?= $this->element('Manager/fClassResult') ?>
								</div>
							</div>

							<p class="font-color">email</p>
							<input type="email" name="email" value="<?= $key['email'] ?>" readonly class="form-control">

							<input type="hidden" name="Del_flg" value="<?= $key['Del_flg']?>">
							<input type="hidden" name="updateFlg" value="0" id="updateFlg">

							<div class="row" id="UpdateButtons">
								<div class="col-md-11 right">
									<button type="button" class="btn btn-danger udelete <?= $key['Del_flg']?'active':'';?>" data-toggle="button" autocomplete="off">
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
