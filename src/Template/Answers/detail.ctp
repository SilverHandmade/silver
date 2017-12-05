<?php
	$this->start('css');
	echo $this->Html->css('/private/css/kota/answers.css');
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
						<p class="title"><?= $witsesArray[0]['title']; ?></p>
					</div>
					<div class="sisetu-date">
						<p class="sisetu">
							<?= $witsesArray[0]['user_id'];?>さん
						</p>
						<p class="date">
							<?= $witsesArray[0]['Postdate']; ?>
						</p>
					</div>
					<div class="main">
						<p>
							<?= $witsesArray[0]['content']; ?>
						</p>
					</div>
				</div>
				<div class="answers2">
					<div class="ans">
						<textarea name="textarea" rows="6" cols="80" class="tarea form-control" placeholder="回答してね" id="answertxt"></textarea>
					</div>
					<div class="ans-btn">
						<button type="submit" name="ans-submit" class="ans-btn" id="answerbtn">回答</button>
					</div>
				</div>
				<div class="">
					<?php if ($_SESSION['Auth']['User']['id'] == $witsesArray[0]['user_id']): ?>
						<button type="submit" class="button" name="edit">編集</button>
					<?php else: ?>
						<button type="button" class="button" onclick="location.href='/silver/answers'">トップへ</button>
					<?php endif; ?>
				</div>
			</form>
		</div>
	</div>
</div>
