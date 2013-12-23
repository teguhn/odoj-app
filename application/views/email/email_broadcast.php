<script>
       $(function(){
	$('#generate_email').click(function(){
                var btn=$(this);
                var btn_val=btn.text();
		$(this).text('loading ...');
	    $.get("<?=base_url('admin/attendees/generate_email')?>",function(result){
		$('#display_dialog').modal('show');
		$('#display_dialog .modal-body').html(result).select();

		// Work around Chrome's little problem
		$('#display_dialog .modal-body').mouseup(function() {
		    // Prevent further mouseup intervention
		    $(this).unbind("mouseup");
		    return false;
		});
		btn.text(isi);
	       });
        })
    });
</script>
<div id="display_dialog" class="modal hide">
    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">x</button>
	<h3>Daftar Email Peserta</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
	<a href="#" class="btn" data-dismiss="modal">Close</a>
    </div>    
</div>
<div class="alert alert-block alert-error <?=$hide?>">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?=validation_errors(); ?>
</div>
<button type="button" class="btn btn-small" id="generate_email">Generate All Emails</button>
<?=form_open_multipart('','class="form-horizontal"'); ?>
<legend>Email Form</legend>
<?=control_open('Recipients','penerima','penerima khusus');?>
    <input type="text" id="penerima" class="input-xlarge" name="penerima" value="<?=set_value('penerima','')?>" />
    <span class="help-inline">pisahkan dengan tanda koma, boleh dikosongkan jika hanya untuk peserta</span>
    <?=input_check('all_att', '1', 'Kirim ke seluruh peserta', true)?>
<?=control_close()?>
<?=input_text('Subject','subject','','class="input-xlarge" '); ?>
<?=control('Message',form_textarea('pesan','','id="pesan" class="tinymce"').form_error('pesan','<span class="help-inline">','</span>'),'pesan'); ?>
<div class="form-actions">
   <?=form_submit('submit', 'Kirim','class="btn btn-primary"'); ?>
</div>
<?=form_close() ?>