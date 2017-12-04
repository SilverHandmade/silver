<?php
	$this->start('css');
	echo $this->Html->css('/private/css/kota/answers.css');
	$this->end();
 ?>
<div class="col-md-offset-2 col-md-7">
	<div class="row">
		<div id="detailtbl">
			<form action="" method="POST" >
				<div class="answers">
					<div class="title2">
						<p class="title"><?php echo $witsesArray[0]['title'] ?></p>
					</div>
					<div class="sisetu-date">
						<p class="sisetu">○○園さん</p>
						<p class="date"><?php echo $witsesArray[0]['Postdate'] ?></p>
					</div>
					<div class="main">
						<p><?php echo $witsesArray[0]['content'] ?></p>
					</div>
				</div>
				<div class="answers2">
					<div class="ans">
						<textarea name="textarea" rows="6" cols="80" class="tarea form-control" placeholder="回答してね"></textarea>
					</div>
					<div class="ans-btn">
						<button type="submit" name="ans-submit" class="ans-btn">回答</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
