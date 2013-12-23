<?=$this->tmpl->btn_add(base_url($this->class_uri.'/add')); ?>
<?php
        if($table_data):
        $this->table->set_template($this->tmpl->table_std());
        $fields=array('name'=>'Type','fee'=>'Fee','early'=>'Early Bird',''=>'Action');
        foreach($fields as $fn => $fd):
            $c=($sort_by == $fn) ? "class=\"sort_$sort_order\"" : "";
            if($fn){
                $heading[]=anchor("$class_uri/view/$fn/" .
                        (($sort_order == 'asc' && $sort_by == $fn) ? 'desc' : 'asc') ,
                        $fd, $c );
            }else{
                $heading[]=$fd;
            }
        endforeach;
        $this->table->set_heading($heading);
        foreach($table_data as $d):
            $row=array(
                $d['name'],
                $d['curr'].' '.number_format($d['fee'], 0, ',', '.'),
                $d['curr'].' '.number_format($d['early'], 0, ',', '.'),
                '<div class="btn-group">'.$this->tmpl->btn_edit($class_uri.'/edit/'.$d['id_fee']).
                $this->tmpl->btn_del($class_uri.'/delete/'.$d['id_fee'],'onclick="return confirm(\'Yakin?\')"').'</div>'
            );
            $this->table->add_row($row);
        endforeach;
?>
<?=$this->table->generate();?>
<?php else: ?>
<div>Tidak ada data</div>
<?php endif; ?>