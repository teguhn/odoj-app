<?php if($this->access->is_role('2') || $this->access->is_role('1')): ?>
<div class="btn-group">
    <?=$this->tmpl->btn_back($class_uri); ?> 
    <?=$this->tmpl->btn_del($class_uri.'/delete/'.$table_data['id_paper']); ?>
    <?=$this->tmpl->btn_print($class_uri.'/detail_report/'.$table_data['id_paper']); ?> 
</div>
<?php endif; ?>
<?php if(!$table_data['fix']): ?>
<?=$this->tmpl->btn_edit($class_uri.'/edit/'.$table_data['id_paper']); ?>
<?php endif; ?>
<table class="table table-striped">
    <tbody>
        <tr>
            <th width="25%">Contact Author</th>
            <td><?=$table_data['cn'] ?></td>
        </tr>
        <?php foreach($field as $fd=>$fn): ?>
        <tr>
            <th width="25%"><?=$fd ?></th>
            <td><?=$table_data[$fn] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if(!$table_data['fix'] && $table_data['confirm']): ?>
<div class="form-actions">
    <a href="<?=base_url('submission/confirm/'.$table_data['id_paper'])?>" class="btn btn-success"
       onclick="return confirm('Do you want to finish the submission?\n\
You will not be able to edit the submission.')">
        Confirm Submission
    </a>
</div>
<?php endif; ?>