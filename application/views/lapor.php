<h1><a href="<?=base_url('term/today/'.$term['id_term'])?>"><?=$term['group_id']?></a></h1>
<textarea id="reportText" class="form-control" rows="35" cols="45">
URL: <?=base_url('term/today/'.$term['id_term'])?>

<?=$term['group_id']?> - <?=date('d/m/Y H:i:s')?>


<?php foreach ($tasks['reports'] as $reader) :	?>
<?=$reader['name']?> (<?=count($reader['report']['juz_read'])?>)
Setoran: <?php if($reader['report']['juz_read']){?>Juz <?=implode(', ',$reader['report']['juz_read'])?><?php }else{ ?>-<?php } ?>;
Hutang: <?php if($reader['report']['hutang']){?>Juz <?=implode(', ',$reader['report']['hutang'])?><?php }else{ ?>-<?php } ?>;
Khatam: <?=$reader['report']['khatam']?>;

<?php endforeach; ?>
exported at <?=date('d/m/Y H:i:s')?>

URL: <?=base_url('term/today/'.$term['id_term'])?>
</textarea>
<script type="text/javascript">
	$(function(){
		$('#reportText').on('click',function(){
			$(this).select();	
		});
	});
</script>