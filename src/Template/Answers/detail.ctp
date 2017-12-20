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
				<div class="answers col-md-12">
					<div class="row title2">
						<div class="col-md-10">
							<p class="title"><?php echo $detailId[0]['title'] ?></p>
						</div>
						<div class="col-md-2">
							<?php if ($user['id'] == $detailId[0]['user_id']): ?>
								<div class="button-right">
									<?= $this->Html->link('編集',["controller" => "answers","action" => "edit",'id' => $witsesId[0]['id'] ],['class'=>'btn btn-primary'])?>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="row sisetu-date">
						<div class="6">
							<p class="sisetu">○○園さん</p>
						</div>
						<div class="6">
							<p class="date"><?php echo $detailId[0]['Postdate'] ?></p>
						</div>
					</div>
					<div class="row main">
						<div class="col-md-12">
							<p><?php echo $detailId[0]['content'] ?></p>
						</div>
					</div>
				</div>
				<div class="row answers2">
					<div class="ans col-md-12">
						<textarea name="textarea" rows="6" cols="80" class="tarea form-control" placeholder="回答してね" id="answertxt"></textarea>
					</div>
					<div class="ans-btn row">
						<div class="col-md-12">
							<?= $this->Html->link('検索画面へ',['controller'=>'Answers','action'=>'index'],['class'=>'btn btn-primary ']); ?>
							<button type="submit" name="ans-submit" class="btn btn-success" id="answerbtn" onclick="return ">回答</button>
						</div>
					</div>
				</div>
			<div id="sample1_table">
				<div>
					<?php foreach ($mes_namelist as $witmesdiv): ?>
						<div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
							<?= $witmesdiv['message'];?>
							<br><br>
							<p>投稿者:<?= $witmesdiv['users']['name']; ?></p>
							<p>所属施設:<?= $witmesdiv['facilities']['name']; ?></p>
							<p>投稿日時:<?= $witmesdiv['transmit'] ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</form>
		</div>
	</div>
</div>
