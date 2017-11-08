<<<<<<< HEAD
<?php $this->start('css'); ?>
  <?= $this->Html->css('/private/css/kota/request.css') ?>
  <?= $this->Html->css('/webroot/css/src/bootstrap.css')?>
  <?= $this->Html->css('request.css') ?>
<?php $this->end(); ?>
<div class="col-md-offset-2 col-md-8 center">
	<p class="font-title">代理人検索 </p>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<form class="" action="" method="post">
				<p class="font-p">制作物タイトル</p>
				<p>
					<input type="text" name="" value="">
				</p>
				<p class="font-p">制作個数</p>
				<p>
					<input type="text" name="" value="" size="3">
				</p>
				<p class="font-p">ワークショップID</p>
				<p>
					<input type="text" name="" value="" size="3">
				</p>
				<p class="font-p">締切日</p>
				<p>
					<input type="date" name="" value="">
				</p>
				<p class="button">
					<button type="submit" name="button">次へ</button>
				</p>
			</form>
		</div>
	</div>
</div>
=======
	<h1>依頼</h1>


<form method="POST" action="">
	<p>製作物タイトル
	<input type="text" name="requestT" value=""></p>
	<p>製作個数
	<input type="text" name="requestN" value= ""></p>
	<p>ワークショップID
	<input type="text" name="wsID" value=""></p>
	<p>締切日
	<input type="date" name="requestD" autocomplete="on"></p>

	<input type="submit" name="createReq" value="送信"><br>
<button type="button" onclick="history.back()">戻る</button>
	</form>




		<?php

echo $results[0];
		if ($input_title = $_POST['requestT'] and $input_num = $_POST['requestN'] and $input_date = $_POST['requestD']) {
			$input_ws = $_POST['wsID'];

		    echo ("<input type='text' size='8' name='name1' value='$input_title'>");
				echo ("<input type='text' size='8' name='name2' value='$input_num'>");
				echo ("<input type='text' size='8' name='name3' value='$input_date'>");
				if ($input_ws != "") {
					checkWsid();
				}else {
					echo ("<input type='text' size='8' name='name4' value='ないお'>");
				}
		}else{
		    echo ("<input type='text' size='8' name='name1' value='未入力'>");
				echo ("必須項目が入力されていません");
		}



		function checkWsid()
		{
			$input_ws = $_POST['wsID'];
		  if (array_search ($input_ws, $results) == false) {
		    	echo ("<input type='text' size='8' name='name4' value='$input_ws'>");
		    }else {
		    	echo "ないです";
		    }
		    return 0;
		}






	?>
>>>>>>> 66aa313173741bc6d78f077ce791c09e8865993c
