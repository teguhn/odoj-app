URL: <a href="<?=base_url('term/today/'.$term['id_term'])?>"><?=base_url('term/today/'.$term['id_term'])?></a>
<h1><?=$term['group_id']?></h1>
<?php
	foreach ($tasks as $key=>$task) :
		echo 'Juz #'.$key.': ';
		$readers=array();
		foreach ($task as $reader) :
			if($reader['status']){
				$readers[]=$reader['name']." :white_check_mark:";
			}else{
				$readers[]=$reader['name'];
			}
		endforeach;
		echo implode(', ', $readers).'<br />';
	endforeach;
?>
<br /> 	
URL: <a href="<?=base_url('term/today/'.$term['id_term'])?>"><?=base_url('term/today/'.$term['id_term'])?></a>