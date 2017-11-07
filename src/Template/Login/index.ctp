<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->input('email') ?>
<?= $this->Form->input('password') ?>
<a class="btn btn-info" href="/silver/regist">regist</a>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>
