<?php
	$this->start('css');
	echo $this->Html->css('/private/css/answers/answers.css');
	$this->end();

	$this->start('script');
		echo $this->Html->script('/private/js/answer/answer.js');
	$this->end();
?>
<div class="col-md-offset-2 col-md-8">
	<div class="row">
		<div id="detailtbl">
			<form action="" method="POST" >
				<div class="answers">
					<div class="title2">
						<p>タイトル:</p>
						<input type="text" class="form-control margin-bottom" name="edittitle" value="<?php echo $detailId[0]['title'] ?>"></input>
					</div>
					<div class="sisetu-date">
						<p class="sisetu">○○園さん</p>
						<p class="date" value=""><?php echo $detailId[0]['Postdate'] ?></p>
					</div>
					<div class="main">
						<p>内容:</p>
						<textarea name="editcontent" rows="8" cols="100" class="tarea form-control"><?php echo $detailId[0]['content'] ?></textarea>
					</div>
				</div>
				<div class="right">
					<button type="submit" name="editdelete" class="btn btn-primary ">削除</button>
					<button type="submit" name="editbtn" class="btn btn-success">確定</button>
					<?= $this->Html->link('検索画面へ',['controller'=>'Answers','action'=>'index'],['class'=>'btn btn-primary']); ?>
				</div>
			</form>
		</div>
	</div>
</div>
