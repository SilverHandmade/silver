<form action="/regist" method="post" >
    <div class="">
      氏名:<input type="text" name="name" value="">
    </div>
    <div class="">
      フリガナ:<input type="text" name="hurigana" value="">
    </div>
    <div class="pulldown">
      施設名: <select class="" name="" value="">
        <?php foreach ($results->name as $key=>$value){
          echo "$value";
        } ?>
      </select>
    </div>
    <div class="">
      メールアドレス:<input type="text" name="email" value="">
    </div>
    <div class="">
      再入力:<input type="text" name="email" id="reemail">
    </div>
    <div class="">
      パスワード:<input type="text" name="password" value="">
    </div>
    <div class="">
      再入力:<input type="text" name="password" id="repassword">
    </div>
    <input type="button" value="送信">
    <?= $results[0]->name ?>
    </form>
