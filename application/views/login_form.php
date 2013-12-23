<?=form_open($action,'class="form-horizontal form"') ?>
<?=control_open('Username')?>
<?=form_input($username) ?>
<?=control_close()?>
<?=control_open('Password')?>
<?=form_password($password) ?>
<?=control_close()?>
<?=control_open('')?>
<?=form_submit($submit) ?>
<?=control_close()?>
<?=form_close() ?>