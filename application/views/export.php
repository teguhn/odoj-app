<!DOCTYPE html>
<html>
  <head>
    <title><?=$term['group_id']?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
<a href="<?=base_url('term/today/'.$term['id_term'])?>"><< Back</a><br/>
Copy text (untuk di group chat):<br/>
<textarea rows="35" cols="50">
URL: <?=base_url('term/today/'.$term['id_term'])?>

<?=$term['group_id']?>

<?php
ksort($tasks);
	foreach ($tasks as $key=>$task) :
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
URL: <?=base_url('term/today/'.$term['id_term'])?>
</textarea>
<br /> 	
<a href="<?=base_url('term/today/'.$term['id_term'])?>"><< Back</a>
  </body>
</html>