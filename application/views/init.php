<?=form_open($action,'class="form-horizontal"'); ?>
<legend>Buat Grup Baru</legend>
<?php
	input_text('Nama Grup','group_id');
	for($i=1;$i<=30;$i++):
		input_text('Juz #'.$i,'juz['.$i.']','','class="form-control" placeholder="Pisahkan nama dengan tanda koma"');
	endfor;
?>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
       <?=form_submit('submit', 'Save','class="btn btn-primary btn-lg btn-block"'); ?>
	</div>
</div>
<?=form_close() ?>