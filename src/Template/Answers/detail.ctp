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
						<p class="title"><?php echo $detailId[0]['title'] ?></p>
					</div>
					<div class="sisetu-date">
						<p class="sisetu">○○園さん</p>
						<p class="date"><?php echo $detailId[0]['Postdate'] ?></p>
					</div>
					<div class="main">
						<p><?php echo $detailId[0]['content'] ?></p>
					</div>
				</div>
				<div class="answers2">
					<div class="ans">
						<textarea name="textarea" rows="6" cols="80" class="tarea form-control" placeholder="回答してね" id="answertxt"></textarea>
					</div>
					<div class="ans-btn">
						<button type="submit" name="ans-submit" class="btn btn-success" id="answerbtn" onclick="return ">回答</button>
					</div>
				</div>

		<?php if ($user['id'] == $detailId[0]['user_id']): ?>
			<button type="submit" name="edit" class="btn btn-primary">編集</button>
		<?php else: ?>
			<?= $this->Html->link('トップへ',['controller'=>'Answers','action'=>'index'],['class'=>'btn btn-primary']); ?>
		<?php endif; ?>

			<div id="sample1_table">
				<div>
					<?php foreach ($witmesArray as $witmesdiv): ?>
						<div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
							<?= $witmesdiv['message'];?>
							<br><br>
							<?= $witmesdiv['transmit'] ?>
						</div>
					<?php endforeach; ?>
				</div>
			</form>
		</div>
	</div>
</div>
