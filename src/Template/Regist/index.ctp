<?php $this->start('css'); ?>
  <?= $this->Html->css('/private/css/kota/regist.css') ?>
  <?= $this->Html->css('/webroot/css/src/bootstrap.css')?>
  <?= $this->Html->css('regist.css') ?>
<?php $this->end(); ?>
<div class="col-md-offset-2 col-md-8 center" id="form">
  <p class="form-title">新規登録</p>
  <div class="row">
    <div class="col-md-offset-3 col-md-6">
      <form action="#">
        <p class="font-color">名前</p>
        <p class=".username">
          <input type="text" name="username" value="">
        </p>
        <p class="font-color">フリガナ</p>
        <p class="furigana">
          <input type="text" name="furigana" value="">
        </p>
        <p class="font-color">施設名</p>
        <p class="facilityname">
          <input type="text" name="mailadress" value="">
        </p>
        <p class="font-color">メールアドレス</p>
        <p class="mailadress">
          <input type="text" name="mailadress" value="">
        </p>
        <br>
        <p class="mailadress">
          <input type="text" name="remailadress" value="" placeholder="再入力">
        </p>
        <p class="font-color">パスワード</p>
        <p class="password">
          <input type="password" name="password" value="">
        </p>
        <br>
        <p>
          <input type="password" name="repassword" value="" placeholder="再入力">
        </p>
        <p class="submit">
          <button type="submit" name="regista" class="submit">登録</button>
        </p>
      </form>
    </div>
  </div>
</div>
