
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

echo $results[1];
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
