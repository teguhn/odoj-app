<?php if($this->access->is_role('2') || $this->access->is_role('1')): ?>
<div class="btn-group">
    <?=$this->tmpl->btn_back($class_uri); ?> 
    <?=$this->tmpl->btn_del($class_uri.'/delete/'.$table_data['id_att']); ?>
    <?=$this->tmpl->btn_print($class_uri.'/detail_report/'.$table_data['id_att']); ?> 
</div>
<?php endif; ?>
<h2>
    <?=$table_data['name'] ?>
    <small><?=$this->tmpl->btn_edit($class_uri.'/edit/'.$table_data['id_att']); ?></small>
</h2>
<table class="table table-striped">
    <tbody>
        <?php foreach($field as $fd=>$fn): ?>
        <tr>
            <th width="25%"><?=$fd ?></th>
            <td><?=$table_data[$fn] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    <?=$this->tmpl->btn_edit($class_uri.'/edit/'.$table_data['id_att']); ?> 
