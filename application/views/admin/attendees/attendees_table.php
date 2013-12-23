<p class="lead">
    Total : <?=$total_rows?> | Sudah bayar : <?=$total_paid?> | Email berbeda : <?=$total_email?>
</p>
<?php
        if($table_data):
        $this->table->set_template($this->tmpl->table_std());
        $fields=array('first_name'=>'Full Name','institution'=>'Institusi','department'=>'Department','email'=>'Email','fee'=>'Fee Type','file'=>'Payment',''=>'Aksi');
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
		$no=1;
        foreach($table_data as $d):
            $d['file']=($d['file']) ? '<a download="'.$d['file'].'" href="'.DIR_FILE_UPLOAD.'/'.$d['file'].'">Download</a>' : '-';
            $row=array(
                anchor(base_url($this->class_uri.'/detail/'.$d['id_att']),$d['title'].' '.$d['first_name'].' '.$d['last_name'],'class="tip-right" title="klik untuk detail"'),
                $d['institution'],
                $d['department'],
                $d['email'],
                $d['name'].' '.$d['curr'].' ('.number_format($d['fee'], 0, ',', '.').')',
                $d['file'],
                '<div class="btn-group">'.$this->tmpl->btn_edit($class_uri.'/edit/'.$d['id_att']).
                $this->tmpl->btn_del($class_uri.'/delete/'.$d['id_att'],'onclick="return confirm(\'Yakin?\')"').'</div>'
            );
            $this->table->add_row($row);
        endforeach;
?>
<?=$this->table->generate();?>
<?=$this->pagination->create_links();?>
<?php else: ?>
<div>Tidak ada data</div>
<?php endif; ?>