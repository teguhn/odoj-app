<?=$this->tmpl->btn_add(base_url($this->class_uri.'/add')); ?>
<?php
        if($table_data):
        $this->table->set_template($this->tmpl->table_std());
        $this->table->set_heading('Menu','Link','Role','Urutan','Parent','Aksi');
        foreach($table_data as $d):
            $row=array(
                $d['menu'],
                $d['link'],
                $d['role'],
                $d['order'],
                $menu_name[$d['parent_id']],
                '<div class="btn-group">'.$this->tmpl->btn_edit($this->class_uri.'/edit/'.$d['id']).
                $this->tmpl->btn_del($this->class_uri.'/delete/'.$d['id'],'onclick="return confirm(\'Yakin?\')"').'</div>'
            );
            $this->table->add_row($row);
        endforeach;
?>
<?=$this->table->generate();?>
<?=$this->pagination->create_links();?>
<?php else: ?>
<div>Tidak ada data</div>
<?php endif; ?>
