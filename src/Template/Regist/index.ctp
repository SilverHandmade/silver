
<?php
	$this->start('script');
	echo $this->Html->script('/private/js/regist/regist.js');
	$this->end();




?>
<!-- -->
<form action="regist" method="get" >
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
      施設名: <select name="facilities"><?php $i=0; ?>
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
			$postname = $this->request->getData('name');
			$posthurigana  = $this->request->getData('hurigana');
			$postmail  = $this->request->getData('email');
			$postremail  = $this->request->getData('reemail');
			$postpass  = $this->request->getData('password');
			$postrepass  = $this->request->getData('repassword');
      echo "<input type='text' name='' value='$postname'>";
      echo "<input type='text' name='' value='$posthurigana'>";
      echo "<input type='text' name='' value='$postmail'>";
      echo "<input type='text' name='' value='$postremail'>";
      echo "<input type='text' name='' value='$postpass'>";
      echo "<input type='text' name='' value='$postrepass'>";

			if ($postname !="") {
				$name = $this->request->getData('name');
				echo $name;
			}else {
				echo "nameなっしんぐ";
			}

    ?>


    </form>
