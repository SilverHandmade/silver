<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();
?>

<?php
	$this->start('css');
	echo $this->Html->css('/private/css/request/request.css');
	$this->end();
 ?>

<div class="col-md-offset-2 col-md-8">
	<div class="row">
		<form action="" method="POST" >
			<div>
				<h2 align="center">メッセージ</h2>
				<h4 align="center">タイトル：<?php echo $request_info[0]['title'] ?></h4>
			</div>
			<div>
				<div>
					<textarea name="textarea" rows="6" cols="80" class="tarea form-control" placeholder="文章の入力" id="messagetxt"></textarea>
				</div>
				<div class="ans-btn right">
					<button type="submit" name="mes-submit" class="btn btn-success" id="messagebtn">送信</button>
				</div>
			</div>
			<div id="sample1_table">
				<div>
					<?php
					$i = 0;
					foreach ($message_array as $message): ?>
						<div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
							<p><?= $message['message'];?></p>
							<br><br>
							<p>投稿者：
							<?php echo $mes_namelist[$i]['users']['name'];?></p>
							<p>所属施設：
							<?php echo $mes_namelist[$i]['facilities']['name'];
							$i = $i + 1; ?></p>
							<p>投稿日時：<?=$message['transmit'];?></p>
						</div>
					<?php endforeach; ?>
				</div>
				<?= $this->Html->link('戻る',['controller'=>'Request','action'=>'detail','id' => $this->request->getQuery('id')],['class'=>'btn btn-primary']); ?>
			</div>
		</form>
	</div>
</div>
