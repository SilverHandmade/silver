
<?php
	$this->start('script');
	echo $this->Html->script('/private/js/フォルダ名/ファイル名.js');
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
      メールアドレス:<input type="email" name="email" value="">
    </div>

    <div class="">
      <!-- $postremail-->
      再入力:<input type="email" name="reemail">
    </div>

    <div class="">
      <!-- $postpass-->
      パスワード:<input type="text" name="password" value="">
    </div>

    <div class="">
      <!-- $postrepass-->
      再入力:<input type="text" name="repassword">
    </div>

    <!-- -->
    <button type="submit"　name="" value="">送信</button>
<input type="text" name="" value="">
    <?php
      $postname = $_POST['name'];
      $posthurigana  = $_POST['hurigana'];
      $postmail  = $_POST['email'];
      $postremail  = $_POST['reemail'];
      $postpass  = $_POST['password'];
      $postrepass  = $_POST['repassword'];
      echo "<input type="text" name="" value="">";
      echo "$posthurigana";
      nl2br("\n");
      echo "$postmail";
      nl2br("\n");
      echo "$postremail";
      nl2br("\n");
      echo "$postpass";
      nl2br("\n");
      echo "$postrepass";
      nl2br("\n");
    ?>


    </form>
