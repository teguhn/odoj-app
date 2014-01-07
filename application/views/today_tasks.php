<h1><a href="<?=base_url('term/today/'.$term['id_term'])?>"><?=$term['group_id']?></a></h1>
<!-- Nav tabs -->
<ul class="nav nav-pills">
  <li class="active"><a href="#report" data-toggle="tab">Setoran</a></li>
  <li><a href="#progress" data-toggle="tab">Jadwal Hari Ini</a></li>
</ul>

<!-- Tab panes -->
<?=form_open($action,'class="form-horizontal"',$hidden); ?>
<div class="tab-content">
  <div class="tab-pane" id="progress">
		<h2>Jadwal hari ini
		</h2>
		<div class="btn-group">
			<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update">
			 <span class="glyphicon glyphicon-edit"></span> Ubah jadwal
			</button>
			<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exportText">
			 <span class="glyphicon glyphicon-file"></span> Copy text jadwal
			</button>
<!-- 		  <a target="_blank" href="<?=base_url('term/export/'.$term['id_term'])?>" class="btn btn-danger btn-sm">
			<span class="glyphicon glyphicon-file"></span> Copy text jadwal
		  </a>
 -->		</div>
		<br/>
		<br/>
		<span>Pilih nama Anda untuk setor:</span>		
		<div class="form-group">
		    <div class="col-xs-12">
		       <?=form_submit('submit', 'Setor','class="btn btn-success btn-lg btn-block"'); ?>
			</div>
		</div>
		<?php
			ksort($tasks['juz']);
			foreach ($tasks['juz'] as $key=>$task) :
				control_open('Juz #'.$key,'','col-xs-4 col-md-2','col-xs-8 col-md-10');
				foreach ($task as $reader) :
					$status=$reader['status']>0 ? ' <span class="badge">'.$reader['status'].'</span>' : '';
					if($reader['status']){
						echo '<span class="glyphicon glyphicon-ok"></span> '.$reader['name'].$status;
					}else{
						input_radio($reader['name'].$status,'reader',$reader['name']);
					}
					echo "&nbsp;&nbsp;&nbsp;";
				endforeach;
				control_close();
			endforeach;
		?>  	
	<div class="form-group">
	    <div class="col-xs-12">
	       <?=form_submit('submit', 'Setor','class="btn btn-success btn-lg btn-block"'); ?>
		</div>
	</div>
  </div>
  <div class="tab-pane active" id="report">
  <h2>Progress angggota</h2>
<p>Banyaknya bacaan yang sudah dibaca:
<?=$group_report['juz_read']?> juz,
<?=$group_report['khatam']?> khatam
</p>
<div class="alert alert-info alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Petunjuk:</strong> Untuk setor bacaan, klik nama Anda, pilih juz yang telah dibaca, lalu klik "Simpan".
</div>

<div class="table-responsive">
		<table class="table table-striped">
			<thead>
			<tr>
				<th>Nama</th>
				<th>Setoran</th>
				<th>Hutang</th>
				<th>Khatam</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($tasks['reports'] as $reader) :	?>
				<tr>
					<td>
						<a href="<?=base_url('term/edit/'.$reader['id_task'])?>" data-toggle="modal" data-target="#edit_task">
							<?=$reader['name']?> (<?=count($reader['report']['juz_read'])?>)
						</a>
					</td>
					<td><span class="glyphicon glyphicon-ok"></span>
					<?=($reader['report']['juz_read'])?"Juz":"-"?>
					<?=implode(', ',$reader['report']['juz_read'])?>
					</td>
					<td><span class="glyphicon glyphicon-remove"></span>
					<?=($reader['report']['hutang'])?"Juz":"-"?>
					<?=implode(', ',$reader['report']['hutang'])?>
					</td>
					<td><?=$reader['report']['khatam']?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	  </div>
  </div>
</div>
<?=form_close() ?>
<?=form_open($action_update,'class="form-horizontal"',$hidden); ?>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Ubah Jadwal Saya</h4>
      </div>
      <div class="modal-body">
		<?php
				control_open('Nama pembaca','update_reader','col-xs-6 col-md-4','col-xs-6 col-md-8');
				echo form_dropdown('update_reader',$members,'','id="update_reader" class="form-control"');
				control_close();
				$juz_list=array();
				for($i=1;$i<=30;$i++){$juz_list[$i]='Juz ke-'.$i;}
				control_open('Juz hari ini','update_juz','col-xs-6 col-md-4','col-xs-6 col-md-8');
				echo form_dropdown('update_juz',$juz_list,'','id="update_juz" class="form-control"');
				control_close();
		?>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?=form_close() ?>
<!-- Modal -->
<div class="modal fade" id="exportText" tabindex="-1" role="dialog" aria-labelledby="exportTextLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="exportTextLabel">Copy text:</h4>
      </div>
      <div class="modal-body">
			<textarea class="form-control" rows="35" cols="45">
URL: <?=base_url('term/today/'.$term['id_term'])?>

<?=$term['group_id']?> - <?=date('d/m/Y H:i:s')?>

<?php
ksort($tasks['juz']);
	foreach ($tasks['juz'] as $key=>$task) :
		echo 'Juz '.$key.': ';
		$readers=array();
		foreach ($task as $reader) :
			if($reader['status']){
				$readers[]=$reader['name']."(ok)";
			}else{
				$readers[]=$reader['name'];
			}
		endforeach;
		echo implode(', ', $readers);?>

<?php	endforeach;
?>
exported at <?=date('d/m/Y H:i:s')?>

URL: <?=base_url('term/today/'.$term['id_term'])?>
</textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->
<div class="modal fade" id="edit_task" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
</div><!-- /.modal -->
<script type="text/javascript">
	$(function(){
		<?php if(isset($_GET['export'])): ?>
			$('#exportText').modal();
		<?php endif; ?>
		<?php if(isset($_GET['tab'])): ?>
			$('a[href="#<?=$_GET['tab']?>"]').tab('show');
		<?php endif; ?>
		$('#exportText').find('textarea').on('click',function(){
			$(this).select();	
		});
		$('#edit_task').on('hidden.bs.modal', function () {
		    $(this).empty().removeData('bs.modal');
		});	
	});
</script>