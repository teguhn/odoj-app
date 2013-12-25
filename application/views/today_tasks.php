<h1><?=$term['group_id']?></h1>
<!-- Nav tabs -->
<ul class="nav nav-pills">
  <li class="active"><a href="#progress" data-toggle="tab">Hari Ini</a></li>
  <li><a href="#extend" data-toggle="tab">Juz Lainnya</a></li>
  <li><a href="#report" data-toggle="tab">Laporan</a></li>
</ul>

<!-- Tab panes -->
<?=form_open($action,'class="form-horizontal"',$hidden); ?>
<div class="tab-content">
  <div class="tab-pane active" id="progress">
		<h2>Jadwal hari ini
		</h2>
		<div class="btn-group">
			<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update">
			 <span class="glyphicon glyphicon-edit"></span> Ubah jadwal
			</button>
		  <a target="_blank" href="<?=base_url('term/export/'.$term['id_term'])?>" class="btn btn-danger btn-sm">
			<span class="glyphicon glyphicon-file"></span> Copy text jadwal
		  </a>
		</div>
		<br/>
		<br/>
		<span>Pilih nama Anda untuk setor:</span>		
		<?php
			foreach ($tasks as $key=>$task) :
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
  <div class="tab-pane" id="extend">
  	<h2>Setor hutang/tambahan</h2>
		<?php
				control_open('Nama pembaca','extend_reader','col-xs-4 col-md-2','col-xs-8 col-md-4');
				echo form_dropdown('extend_reader',$members,'','id="extend_reader" class="form-control"');
				control_close();
				control_open('Pilih juz','','col-xs-4 col-md-2','col-xs-8 col-md-10');
				for($i=1;$i<=30;$i++){
					if($i%10==1){
						echo '<div class="col-md-4 col-sm-6">';
					}
					input_check('extend[]',$i,'Juz #'.$i,false);
					echo "<br/>";
					if($i%10==0){
						echo '</div>';
					}
				}
				control_close();
		?>
	<div class="form-group">
	    <div class="col-xs-12">
	       <?=form_submit('submit', 'Setor','class="btn btn-success btn-lg btn-block"'); ?>
		</div>
	</div>
  </div>
  <div class="tab-pane" id="report">
  <h2>Progress angggota</h2>
	  <div class="table-responsive col-sm-6">
		<table class="table table-striped">
			<thead>
			<tr>
				<th>Nama</th>
				<th>hutang</th>
				<th>Juz dibaca</th>
				<th>Khatam</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($tasks as $key=>$task) : ?>
				<?php foreach ($task as $reader) :	?>
				<tr>
					<td><?=$reader['name']?></td>
					<td>
					<?=($reader['report']['hutang'])?"Juz":"-"?>
					<?php foreach ($reader['report']['hutang'] as $hutang) {?>
						#<?=$hutang?> 
					<?php } ?>
					</td>
					<td><?=$reader['report']['juz_read']?></td>
					<td><?=$reader['report']['khatam']?></td>
				</tr>
				<?php endforeach; ?>
			<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="2">Total</th>
					<th><?=$group_report['juz_read']?></th>
					<th><?=$group_report['khatam']?></th>
				</tr>
			</tfoot>
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