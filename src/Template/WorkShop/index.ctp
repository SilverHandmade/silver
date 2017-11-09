<?php $this->start('css'); ?>
  <?= $this->Html->css('/private/css/kota/workshop.css') ?>
  <?= $this->Html->css('/webroot/css/src/bootstrap.css')?>
  <?= $this->Html->css('workshop.css') ?>
	<?= $this->Html->js('/private/js/kota/workshop.js') ?>
<?php $this->end(); ?>

<div class="center">
  <p class="font-title">ワークショップ</p>
    <p><button id="method-insertBefore">追加</button></p>
    <form class="" action="index.html" method="post">
      <div class="row">
        <div class="col-md-4">
          <p class="font-p">タイトル</p>
          <p>
            <input type="text" name="title" value="">
          </p>
        </div>
        <div class="col-md-4">
          <p class="font-p">イメージ</p>
          <p>
            <input type="file" name="" value="">
          </p>
        </div>
        <div class="col-md-4">
          <p class="font-p">コメント</p>
          <p>
            <input type="text" name="work">
          </p>
        </div>
        <p><button type="submit" name="">送信</button></p>
    </form>
    <p><button id="method-appendTo">追加</button></p>
  </div>
</div>
