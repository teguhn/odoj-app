<div class="alert alert-block alert-error <?=$hide?>">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?=validation_errors(); ?>
</div>
<?=form_open($action,'class="form-horizontal"',$hidden); ?>
<?php $this->tmpl->input_text('Role*','role',$role); ?>
<?php $this->tmpl->input_text('Nicename*','nicename',$nicename); ?>
<?php $this->tmpl->action(); ?>
<?=form_close() ?>