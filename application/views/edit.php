<?=form_open($action,'class="form-horizontal"',$hidden); ?>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      	<div class="pull-right">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
	        <button type="submit" id="edit_send" data-loading-text="Mengirim..." class="btn btn-success">Simpan</button>
    	</div>
        <h4 class="modal-title" id="myModalLabel"><?=$task->reader?></h4>
      </div>
      <div class="modal-body">
		<?php
			for($i=1;$i<=30;$i++){
				control_open('Juz ke-'.$i,'juz'.$i,'col-xs-6 col-md-4','col-xs-6 col-md-8');
				$k=$i-1;
				for($j=1;$j<=$status[$k];$j++):
					echo '<input type="checkbox" value="1" checked name="status['.$k.'][]" /> &nbsp;';
				endfor;
				echo '<input type="checkbox" value="1" name="status['.$k.'][]" />';
				control_close();
			}
		?>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" id="edit_send" data-loading-text="Mengirim..." class="btn btn-success">Simpan</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
<?=form_close()?>