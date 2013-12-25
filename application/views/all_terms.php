<h1>Pilih Grup</h1>
<div class="list-group">
<?php foreach ($terms as $term) { ?>
	<a class="list-group-item" href="<?=base_url()?>term/today/<?=$term['id_term']?>"><?=$term['group_id']?></a>
<?php } ?>
</div>
<hr/>
<a href="term/init" class="btn btn-lg btn-primary">Buat grup baru</a>