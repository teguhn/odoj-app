<div class="alert alert-block alert-error <?=$hide?>">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?=validation_errors(); ?>
</div>
<?=form_open($action,'class="form-horizontal"',$hidden); ?>
<?php $this->tmpl->input_text('Nama Lengkap','nama',$nama); ?>
<?php $this->tmpl->input_text('Email*','email',$email); ?>
<?php $this->tmpl->input_text('Username*','username',$username); ?>
<?php $this->tmpl->input_text('Password','password','','','password'); ?>
<?php $this->tmpl->input_text('Konfirmasi Password','passconf','','','password'); ?>
<?php $this->tmpl->control('Role*',form_dropdown('role_id',$role,$role_selected,'id="role"'),'role'); ?>
<?php $this->tmpl->action(); ?>
<?=form_close() ?>