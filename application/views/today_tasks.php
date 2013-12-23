<h1><?=$term['group_id']?></h1>
<!-- Nav tabs -->
<ul class="nav nav-pills">
  <li class="active"><a href="#progress" data-toggle="tab">Hari Ini</a></li>
  <li><a href="#extend" data-toggle="tab">Extra</a></li>
  <li><a href="#report" data-toggle="tab">Laporan</a></li>
</ul>

<!-- Tab panes -->
<?=form_open($action,'class="form-horizontal"',$hidden); ?>
<div class="tab-content">
  <div class="tab-pane active" id="progress">
		<h2>Setor hari ini</h2>
		<?php
			$readers_name=array();
			foreach ($tasks as $key=>$task) :
				control_open('Juz #'.$key,'','col-xs-4 col-md-2','col-xs-8 col-md-10');
				foreach ($task as $reader) :
					$readers_name[$reader['name']]=$reader['name'];
					$reader['status']=$reader['status']>0 ? "(".$reader['status'].")" : "";
					input_radio($reader['name'].$reader['status'],'reader',$reader['name']);
					echo "&nbsp;&nbsp;&nbsp;";
				endforeach;
				control_close();
			endforeach;
		?>  	
	<div class="form-group">
	    <div class="col-xs-12">
	       <?=form_submit('submit', 'Save','class="btn btn-primary btn-lg btn-block"'); ?>
		</div>
	</div>
  </div>
  <div class="tab-pane" id="extend">
  	<h2>Setor utang/tambahan</h2>
		<?php
				control_open('Pembaca','','col-xs-4 col-md-2','col-xs-8 col-md-4');
				echo form_dropdown('extend_reader',$readers_name,'','id="extend_reader" class="form-control"');
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
	       <?=form_submit('submit', 'Save','class="btn btn-primary btn-lg btn-block"'); ?>
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
				<th>Utang</th>
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
					<?=($reader['report']['utang'])?"Juz":"-"?>
					<?php foreach ($reader['report']['utang'] as $utang) {?>
						#<?=$utang?> 
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