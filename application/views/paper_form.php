<?php
    $att_id=$this->session->userdata('att_id');
    $reg=$this->db->get_where('attendees',array('id_att'=>$att_id))->row_array();
    $reg['address'] = preg_replace("/\n/"," ",$reg['address']);
?>
<script type="text/javascript">
    $(function(){
        $('#get_reg').click(function(){
            $('#cn_first').val('<?=$reg['first_name']?>');
            $('#cn_last').val('<?=$reg['last_name']?>');
            $('#institution').val('<?=$reg['institution']?>');
            $('#department').val('<?=$reg['department']?>');
            $('#address').val('<?=$reg['address']?>');
            $('#phone').val('<?=$reg['phone']?>');
            $('#email').val('<?=$reg['email']?>');
            $('#paper_title').val('<?=$reg['paper_title']?>');
        });
    });
</script>
<div class="alert alert-block alert-error <?=$hide?>">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?=validation_errors(); ?>
</div>
<?=form_open_multipart($action,'class="form-horizontal"',$hidden); ?>
*the fields with asterisk are mandatory
<button class="btn btn-info btn-mini" type="button" id="get_reg">Copy data from registration</button>
<legend>Contact Author</legend>
<?php $this->tmpl->input_text('First Name*','cn_first',$cn_first); ?>
<?php $this->tmpl->input_text('Last Name','cn_last',$cn_last); ?>
<?php $this->tmpl->input_text('Institution*','institution',$institution); ?>
<?php $this->tmpl->input_text('Department','department',$department); ?>
<?php $this->tmpl->input_text('Address*','address',$address); ?>
<?php //$this->tmpl->control('Address*',form_textarea('address',$address,'id="add" class="input-xlarge"'),'add'); ?>
<?php $this->tmpl->input_text('Telephone*','phone',$phone); ?>
<?php $this->tmpl->input_text('Email*','email',$email); ?>
<legend>Authors List</legend>
<?php $this->tmpl->control('Authors List',form_textarea('authors_list',$authors_list,'id="authors_list" class="input-xlarge"'),'authors_list'); ?>
<legend>Paper Data</legend>
<?php $this->tmpl->control('Title*',form_textarea('paper_title',$paper_title,'id="paper_title" class="input-xlarge"'),'paper_title'); ?>
    <?php $sections=array(
    'Health (Mini Symposium): any bio-resources to support health industry'
    ); ?>
<?php $this->tmpl->control_open('Section (please choose preferred topic)*'); ?>
    <?php foreach($sections as $s): ?>
        <?php
        $checked=($section==$s) ? TRUE:FALSE;
        $this->tmpl->input_radio($s,'section',$s,$checked,set_radio('section',$s));
        ?>
    <?php endforeach; ?>
<?php $this->tmpl->control_close(); ?>
<?php $this->tmpl->control_open('Full Paper Upload','file'); ?>
<?php
    if(isset($file))
        echo $file.' <a class="btn btn-mini" download="'.$file.'" href="'.DIR_FILE_UPLOAD.'/'.$file.'">Download</a><br />';
?>
    <?php echo form_upload('file','','id="file"'); ?>
    <div class="help">You can update this file later</div>
<?php $this->tmpl->control_close(); ?>
<div class="form-actions">
   <?=form_submit('submit', 'Save','class="btn btn-primary"'); ?>
</div>
<?=form_close() ?>