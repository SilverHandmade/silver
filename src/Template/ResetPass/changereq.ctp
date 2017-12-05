<?= $this->Html->css('/private/css/kota/resetpass.css') ?>

<?php if ($_POST['flg'] == 1) { ?>

	 <!-- <body onload="document.F.submit();"> -->
		 <form METHOD="post" name="F" action="http://localhost/silver/resetpass/mailchange?uu=<?php echo $_POST['uu'];?>">
		 	<input type="hidden" name="nopass" value=1>
			<input type="submit" >
 		</form>
 	<!-- </body> -->
<?php }elseif ($this->request->is('post')) { ?>
	<div id="form">
			<p>パスワードが再設定されました</p>
	</div>
<?php }?>
