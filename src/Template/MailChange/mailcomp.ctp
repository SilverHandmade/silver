<?= $this->Html->css('/private/css/resetpass/resetpass.css') ?>
<?php if($sa_flg == 1){?>
	<p>メールの変更が完了しました。</p>
	<span style="border-bottom: solid 1px;">
		<a href="<?= $this->Url->build(["controller" => "TopPage","action" => "index"]);?>">
			トップへ
		</a>
	</span>
<?php }else {?>
<?php }?>
