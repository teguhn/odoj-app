<h1>Pilih Grup</h1>
<ul class="nav nav-pills nav-stacked">
<?php foreach ($terms as $term) { ?>
	<li><a href="term/today/<?=$term['id_term']?>"><?=$term['group_id']?></a></li>
<?php } ?>
</ul>
<hr/>
<a href="term/init" class="btn btn-lg btn-primary">Buat grup baru</a>