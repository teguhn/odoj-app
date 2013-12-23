<?=$this->tmpl->btn_add(base_url($this->class_uri.'/add')); ?>
    <?php
        if($table_data):
        $this->table->set_template($this->tmpl->table_std());
        $fields['File']='file';
        $fields['Aksi']='';
        foreach($fields as $fd => $fn):
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
            $edit=$d['fix'] ? '' : $this->tmpl->btn_edit($class_uri.'/edit/'.$d['id_paper']);
            $d['file']=($d['file']) ? '<a download="'.$d['file'].'" href="'.DIR_FILE_UPLOAD.'/'.$d['file'].'">Download</a>' : '-';
            $row=array(
                '<a href="'.base_url($this->class_uri.'/detail/'.$d['id_paper']).'" class="tip-right" title="klik untuk detail">'.$d['paper_title'].'</a>',
                $d['section'],
                $d['file'],
                '<div class="btn-group">'.$edit.
                $this->tmpl->btn_del($class_uri.'/delete/'.$d['id_paper'],'onclick="return confirm(\'The selected submission will be deleted! Are you sure?\')"').'</div>'
            );
            $this->table->add_row($row);
        endforeach;
?>
<?=$this->table->generate();?>
<?=$this->pagination->create_links();?>
<?php else: ?>
<div>Tidak ada data</div>
<?php endif; ?>