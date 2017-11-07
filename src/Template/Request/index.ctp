	<h1>依頼</h1>


<form method="POST" action="">
	<p>製作物タイトル
	<input type="text" name="requestT" value=""></p>
	<p>製作個数
	<input type="text" name="requestN" value= 0></p>
	<p>ワークショップID
	<input type="text" name="wsID" value=""></p>
	<p>締切日
	<input type="date" name="requestN" autocomplete="on"></p>

	<input type="submit" name="createReq" value="送信"><br>
<button type="button" onclick="history.back()">戻る</button>
	</form>




		<?php
		   $input_data = $_POST['requestN'];
		if ($input_data = $_POST['requestN']) {
		    echo ("<input type='text' size='8' name='name1' value='$input_data'>");
		}else{
		    echo ("<input type='text' size='8' name='name1' value='未入力'>");
		}

	?>
