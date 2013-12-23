<div class="alert alert-block alert-error <?=$hide?>">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?=validation_errors(); ?>
</div>
<?=form_open($action,'class="form-horizontal"',$hidden); ?>
<?php $this->tmpl->input_text('Tipe Peserta','name',$name); ?>
<?php $this->tmpl->input_text('Currency','curr',$curr,'placeholder="IDR/USD/Rp/US$"'); ?>
<?php $this->tmpl->input_text('Biaya Normal','fee',$fee); ?>
<?php $this->tmpl->input_text('Biaya Early Bird','early',$early); ?>
<?php $this->tmpl->action(); ?>
<?=form_close() ?>