<?=$this->tmpl->btn_add(base_url($this->class_uri.'/add')); ?>
<?php
        if($table_data):
        $this->table->set_template($this->tmpl->table_std());
        $this->table->set_heading('ID','Role','Nicename','Aksi');
        foreach($table_data as $d):
            $row=array(
                $d['id_role'],
                $d['role'],
                $d['nicename'],
                '<div class="btn-group">'.$this->tmpl->btn_edit('admin/role/edit/'.$d['id_role']).
                $this->tmpl->btn_del('admin/role/delete/'.$d['id_role'],'onclick="return confirm(\'Yakin?\')"').'</div>'
            );
            $this->table->add_row($row);
        endforeach;
?>
<?=$this->table->generate();?>
<?=$this->pagination->create_links();?>
<?php else: ?>
<div>Tidak ada data</div>
<?php endif; ?>
