<a href="<?=base_url('term/today/'.$term['id_term'])?>"><< Back</a><br/>
Copy text (untuk di group chat):<br/>
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
<br /> 	
<a href="<?=base_url('term/today/'.$term['id_term'])?>"><< Back</a>
<script>
	$(function(){
		$('textarea').on('click',function(){
			$(this).select();	
		});
	});
</script>