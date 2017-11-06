 <?= $this->start('css'); ?>
 	<?= $this->Html->css('/private/css/kota/login.css') ?>
  <?= $this->Html->css('/webroot/css/src/bootstrap.css')?>
 <?= $this->end(); ?>
 <?= $this->Html->css('login.css') ?>
 <form id="login">
 <div class="row">
   <div class="center-block">
 	   <div class="form-title"><h1>Login</h1></div>
         <div class="userid">
           <label>E-Mail</label>
           <input type="text" name="loginID" value="" size="30"><br>
         </div>
         <div class="password">
           <label>PassWord</label>
           <input type="password" name="password" value="" size="30"><br>
         </div>
         <div class="submit">
           <button type="submit" name="login">Login</button>
           <button name="new" onClick="location.href=''">New</button>
         </div>
   </div>
</div>
</form>
