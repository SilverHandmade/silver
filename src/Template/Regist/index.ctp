
<?php
	$this->start('script');
	echo $this->Html->script('/private/js/regist/regist.js');
	$this->end();




?>
<!-- -->
<form action="regist" method="post" >
    <div class="">
      <!-- $postname-->
      氏名:<input type="text" name="name" value="">
    </div>

    <div class="">
      <!-- $posthurigana-->
      フリガナ:<input type="text" name="hurigana" value="">
    </div>

    <div class="pulldown" name="facilities">
      <!-- $postfacilitie-->
      施設名: <select><?php $i=0; ?>
        <?php foreach ($results as $value)
          { ?>
            <option value="name"><?= $results[$i]->name ?></option>
          <?php $i = $i + 1;
          } ?>
      </select>
    </div>

    <div class="">
      <!-- $postmail-->
      メールアドレス:<input type="email" id="regM" name="email" value="">
    </div>

    <div class="">
      <!-- $postremail-->
      再入力:<input type="email" id="regRM" name="reemail">
    </div>

    <div class="">
      <!-- $postpass-->
      パスワード:<input type="text" id="regP" name="password" value="">
    </div>

    <div class="">
      <!-- $postrepass-->
      再入力:<input type="text" id="regRP" name="repassword">
    </div>

    <!-- -->
    <button type="submit" onclick="test();"  value="">送信</button>

    <?php
			$postname = $_POST['name'];
			$posthurigana  = $_POST['hurigana'];
			$postmail  = $_POST['email'];
			$postremail  = $_POST['reemail'];
			$postpass  = $_POST['password'];
			$postrepass  = $_POST['repassword'];
      echo "<input type='text' name='' value='$postname'>";
      echo "<input type='text' name='' value='$posthurigana'>";
      echo "<input type='text' name='' value='$postmail'>";
      echo "<input type='text' name='' value='$postremail'>";
      echo "<input type='text' name='' value='$postpass'>";
      echo "<input type='text' name='' value='$postrepass'>";

			if ($postname !="") {
				$name = $_POST['name'];
				echo $name;
			}else {
				echo "nameなっしんぐ";
			}

    ?>


    </form>
