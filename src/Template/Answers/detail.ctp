<?php
	$this->start('css');
	echo $this->Html->css('/private/css/kota/answers.css');
	$this->end();
 ?>
<div class="col-md-offset-2 col-md-8">
	<div class="row">
		<div id="detailtbl">
			<form action="" method="POST" >
				<div>
					<p class="title"><?php echo $witsesArray[0]['title'] ?></p>
				</div>
				<div class="">
					<p class="sisetu">○○園さん</p>
					<p class="date"><?php echo $witsesArray[0]['Postdate'] ?></p>
				</div>
				<div>
					<p class="main"><?php echo $witsesArray[0]['content'] ?></p>
				</div>
			</form>
		</div>
	</div>
</div>
