<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header pull-left">
<!--     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
 -->    <a class="navbar-brand" href="<?=base_url()?>">
      <small><span class="glyphicon glyphicon-home"></small> ODOJ
    </a>
  </div>
    <div class="navbar-header pull-right">
		<a href="<?=base_url()?>term/init" class="btn btn-default navbar-btn">
			<span class="glyphicon glyphicon-asterisk"></span> Buat Grup
		</a>
      	<button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#feedback">
      		<span class="glyphicon glyphicon-comment"></span> Feedback
  		</button>&nbsp;
  	</div>
  </div>
</nav>
<?=form_open('','class="form-horizontal" id="feedback_form"'); ?>
<!-- Modal Feedback -->
<div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="feedbackLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Kirim Feedback</h4>
      </div>
      <div class="modal-body">
      <div id="alert-feedback" class="alert alert-success alert-dismissable hide">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  Terima kasih atas feedback Anda. Mohon doanya semoga web ini bermanfaat.
	</div>
      <?php
		input_text('Email','email_feedback','','class="form-control" placeholder="email@example.com" required','email');
		control_open('Pesan','pesan_feedback');
	?>
		<textarea name="pesan_feedback" class="form-control" id="pesan_feedback" rows="3" placeholder="Pesan untuk web developer" required></textarea>
		<?php control_close(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" id="send_feedback" data-loading-text="Mengirim..." class="btn btn-primary" value="Kirim"/>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?=form_close(); ?>