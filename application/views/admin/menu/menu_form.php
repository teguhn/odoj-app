<div class="alert alert-block alert-error <?=$hide?>">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?=validation_errors(); ?>
</div>
<?=form_open($action,'class="form-horizontal"',$hidden); ?>
<?php $this->tmpl->input_text('Menu*','menu',$menu); ?>
<?php $this->tmpl->input_text('Link*','link',$link); ?>
<?php $this->tmpl->input_text('Order','order',$order); ?>
<?php $this->tmpl->control_open('Role*'); ?>
<?php foreach ($role as $i) {
    $this->tmpl->input_check($i['role'],'role_id[]',$i['id_role'],$i['check']);
}?>
<?php $this->tmpl->control_close(); ?>
<?php $this->tmpl->control('Parent*',form_dropdown('parent_id',$menu_name,$menu_selected,'id="parent"'),'parent'); ?>
<?php $this->tmpl->action(); ?>
<?=form_close() ?>