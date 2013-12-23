<?=$this->tmpl->btn_add(base_url($this->class_uri.'/add')); ?>
<?php
        if($table_data):
        $this->table->set_template($this->tmpl->table_std());
        $fields=array('nama'=>'Nama','username'=>'Username','email'=>'Email','role'=>'Role',''=>'Aksi');
        foreach($fields as $fn => $fd):
            $c=($sort_by == $fn) ? "class=\"sort_$sort_order\"" : "";
                $heading[]=anchor("$class_uri/view/$fn/" .
                        (($sort_order == 'asc' && $sort_by == $fn) ? 'desc' : 'asc') ,
                        $fd, $c );
        endforeach;
        $this->table->set_heading($heading);
        foreach($table_data as $d):
            $row=array(
                anchor(base_url($this->class_uri.'/detail/'.$d['username']),$d['nama'],'class="tip-right" title="klik untuk detail"'),
                $d['username'],
                $d['email'],
                $d['role'],
                '<div class="btn-group">'.$this->tmpl->btn_edit('admin/user/edit/'.$d['id_user']).
                $this->tmpl->btn_del($class_uri.'/delete/'.$d['id_user'],'onclick="return confirm(\'Yakin?\')"').'</div>'
            );
            $this->table->add_row($row);
        endforeach;
?>
<?=$this->table->generate();?>
<?=$this->pagination->create_links();?>
<?php else: ?>
<div>Tidak ada data</div>
<?php endif; ?>