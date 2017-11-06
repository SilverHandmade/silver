<?= $this->start('css'); ?>
	<?= $this->Html->css('/private/css/kota/login.css') ?>
<?= $this->end(); ?>
<?= $this->Html->css('login.css') ?>
<div class="login">
	<h1>Login</h1>
<table>
  <tr>
    <th>E-Mail</th>
    <td><input type="text" name="loginID" value="" size="30"></td>
  </tr>
  <tr>
    <th>PassWord</th>
    <td><input type="password" name="password" value="" size="30"></td>
  </tr>
  <tr style="text-align:right;">
    <td colspan="2">
			<input type="submit" name="login" value="Login">
      <input type="button" name="new" value="new"  onClick="location.href=''">
    </td>
  </tr>
</table>
</div>
