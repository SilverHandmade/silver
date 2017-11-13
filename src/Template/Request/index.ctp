

<script>
var test = <?php echo $results; ?>;
</script>

<?php
	$this->start('script');
	echo $this->Html->script('/private/js/request/request.js');
	$this->end();
?>



	<h1>依頼</h1>



<form  action="/silver/request" method="post">
	<p>製作物タイトル
	<input  type="text" id="reqT" name="requestT" value=""  maxlength="40" required></p>
	<p>製作個数
	<input type="number" id="reqN" name="requestN" value= "" required></p>
	<p>ワークショップID
	<input type="text" id="wsID" name="wsID" value=""></p>
	<p>締切日
	<input type="date" id="reqD" name="requestD" autocomplete="on" required></p>

	<button type="submit" name="createReq" onclick="return nextpage();">次へ</button><br>
	<button type="button" onclick="aaa();">戻る</button>
	</form>





		<?php
		echo $results[0];










	?>
