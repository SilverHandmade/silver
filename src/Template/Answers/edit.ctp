<?php
	$this->start('css');
	echo $this->Html->css('/private/css/answers/answers.css');
	$this->end();

	$this->start('script');
		echo $this->Html->script('/private/js/answer/answer.js');
	$this->end();
?>
<div class="col-md-offset-2 col-md-7">
	<div class="row">
		<div id="detailtbl">
			<form action="" method="POST" >
				<div class="answers">
					<div class="title2">
						<p>タイトル:</p>
						<input type="text" class="title" name="edittitle" value="<?php echo $detailId[0]['title'] ?>"></input>
					</div>
					<div class="sisetu-date">
						<p class="sisetu"><?= $facilitiesname[0]['facilities']['name'] ?></p>
						<p class="date" value=""><?= date('Y年m月d日　H時i分',strtotime($detailId[0]['Postdate'])) ?></p>
					</div>
					<div class="main">
						<p>内容:</p>
						<input type="text" name="editcontent" value="<?php echo $detailId[0]['content'] ?>"></input>
					</div>


				</div>
			<button type="submit" name="editdelete" class="btn btn-primary ">削除</button>
			<button type="submit" name="editbtn" class="btn btn-success">確定</button>
			<?= $this->Html->link('トップへ',['controller'=>'Answers','action'=>'index'],['class'=>'btn btn-primary']); ?>
			</form>
		</div>
	</div>
</div>
