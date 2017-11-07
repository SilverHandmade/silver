
 <?= $this->Html->css('/private/css/kota/login.css') ?>
 <?= $this->Html->css('/webroot/css/src/bootstrap.css')?>
 <?= $this->Html->css('login.css') ?>
 <div id="form">
   <p class="form-title">ログイン</p>
   <form action="#">
       <p class="font-color">メールアドレス</p>
       <p class="userid">
         <input type="text" name="userID" value="">
       </p>
       <p class="font-color">パスワード</p>
       <p class="password">
         <input type="password" name="password" value="">
       </p>
       <p class="submit">
         <button type="submit" name="login" class="submit">ログイン</button><br>
       </p>
       <p><a href="src/Template/Regist/index.ctp">初めての方はこちら</a></p>
       <p><a href="#">パスワードを忘れた場合はこちら</a></p>
     </form>
  </div>
