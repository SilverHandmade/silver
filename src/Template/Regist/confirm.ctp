	<form class="" method="post">

	<table border>
		<tr>
			<td width=150 height=50>氏名</td>
  			<td width=250 height=50  value=""><?php echo $_POST['name']; ?></td>

		</tr>

  	  	<tr>
		  	<td	width=150 height=50>フリガナ</td>
  	    	<td width=250 height=50><?php echo $_POST['hurigana']; ?></td>

  	  	</tr>

	  	<tr>
		  <td width=150 height=50>施設分類</td>
		  <td width=250>
		  <?php switch ($_POST['fClassId']) {
		  	case '1':?>
		  		保育園
		  		<?php  break;
		  	default:?>
		  		介護施設
		  		<?php  break;
		  } ?>
		  </td>

	  </tr>

	  <tr>
		  <td width=150>施設名</td>
	    <td width=250 height=50><?php echo $fnamearray[0]['name']; ?></td>

	  </tr>

	  <tr>
		  <td width=150>メールアドレス</td>
	    <td width=250 height=50><?php echo $_POST['email']; ?></td>

	  </tr>

	  <tr>
		  <td width=150>パスワード</td>
	    <td width=250 height=50>
			<?php  $str2 = str_repeat('*', strlen($_POST['password']));echo $str2?></td>
	  </tr>

	</table>
	<input type="submit" name="" value="確定">
</form>
