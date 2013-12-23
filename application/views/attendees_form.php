<div class="alert alert-block alert-error <?=$hide?>">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?=validation_errors(); ?>
</div>
<?=form_open_multipart($action,'class="form-horizontal"',$hidden); ?>
*the fields with asterisk are mandatory
<legend>Personal Account (required for editing data)</legend>
<?php $this->tmpl->input_text('Username*','username',$username); ?>
<?php $this->tmpl->input_text('Password*','password','','','password'); ?>
<?php $this->tmpl->input_text('Confirm Password*','passconf','','','password'); ?>
<legend>Personal Data</legend>
<?php $this->tmpl->control('Title*',form_dropdown('title',$title,$title_selected,'id="title"'),'title'); ?>
<?php $this->tmpl->input_text('First Name*','first_name',$first_name); ?>
<?php $this->tmpl->input_text('Last Name','last_name',$last_name); ?>
<?php $this->tmpl->input_text('Institution*','institution',$institution); ?>
<?php $this->tmpl->input_text('Department','department',$department); ?>
<?php $this->tmpl->control('Address*',form_textarea('address',$address,'id="add" class="input-xlarge"'),'add'); ?>
<?php $this->tmpl->input_text('City','city',$city); ?>
<?php $this->tmpl->input_text('Postal Code','postal_code',$postal_code); ?>
<?php $this->tmpl->control('Country*',form_dropdown('country',$country,$country_selected,'id="country"'),'country'); ?>
<?php $this->tmpl->input_text('Telephone*','phone',$phone); ?>
<?php $this->tmpl->input_text('Mobile Phone','mobile',$mobile); ?>
<?php $this->tmpl->input_text('Email*','email',$email); ?>
<?php $this->tmpl->control('Dietary',form_textarea('dietary',$dietary,'id="dietary" class="input-xlarge"'),'dietary'); ?>
<legend>Participation</legend>
<?php 
$types=array('Attendance','Paper Presenter');
$this->tmpl->control_open('Participated as*');
foreach ($types as $t) {
    $checked=($type==$t) ? TRUE:FALSE;
    $this->tmpl->input_radio($t,'type',$t,$checked,set_radio('type',$t));
}
$this->tmpl->control_close();
?>
<?php $this->tmpl->control('The title of the paper<br />(if presenter)',form_textarea('paper_title',$paper_title,'id="paper_title" class="input-xlarge"'),'paper_title'); ?>
<legend>Section (please choose preferred topic)</legend>
<table class="table table-condensed table-striped table-hover">
    <tr>
        <th colspan="2">
            Main Seminar (attendance only)
        </th>
    </tr>
    <?php $sections=array(
    'Food: any bio-resources to support food industry (natural or GMO)',
    'Feed: any bio-resources to support feed industry',
    'Fuel: any bio-resources and bio-process to support biofuel industry',
    'Fertilizer: any bio-resources to support fertilizer industry',
    'Fiber: any bio-resources to support fiber industry (natural fiber)'
    ); ?>
    <?php foreach($sections as $s): ?>
    <tr>
        <td>
            <?php
            $checked=($section==$s) ? TRUE:FALSE;
            $this->tmpl->input_radio($s,'section',$s,$checked,set_radio('section',$s));
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <th colspan="2">
            Mini Symposium
        </th>
    </tr>
    <?php $sections=array(
    'Health: any bio-resources to support health industry'
    ); ?>
    <?php foreach($sections as $s): ?>
    <tr>
        <td>
            <?php
            $checked=($section==$s) ? TRUE:FALSE;
            $this->tmpl->input_radio($s,'section',$s,$checked,set_radio('section',$s));
            ?>
        </td>
    </tr>
    <?php endforeach; ?>    
</table>
<div class="form-actions">
   <?=form_submit('submit', 'Save Registration Data','class="btn btn-primary"'); ?>
</div>
<legend>Payment Information</legend>
Registration Fees
<table class="table table-condensed table-striped table-hover">
    <tr>
        <th colspan="2">
            Main Seminar
        </th>
    </tr>
    <?php foreach($fees_type as $f): ?>
    <tr>
        <td width="75%">
            <label for="<?=$f['id_fee']?>"><?=$f['name']?></label>
        </td>
        <td>
            <?php
            $name=$f['curr'].' '.number_format($f['fee'],0,',','.');
            $checked=($fee_id==$f['id_fee']) ? TRUE:FALSE;
            $this->tmpl->input_radio($name,'fee_id',$f['id_fee'],$checked,set_radio('fee_id',$f['id_fee']).' id="'.$f['id_fee'].'"');
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <th colspan="2">
            Mini Symposium
        </th>
    </tr>
    <?php foreach($fees_type2 as $f): ?>
    <tr>
        <td width="75%">
            <label for="<?=$f['id_fee']?>"><?=$f['name']?></label>
        </td>
        <td>
            <?php
            $name=$f['curr'].' '.number_format($f['fee'],0,',','.');
            $checked=($fee_id==$f['id_fee']) ? TRUE:FALSE;
            $this->tmpl->input_radio($name,'fee_id',$f['id_fee'],$checked,set_radio('fee_id',$f['id_fee']).' id="'.$f['id_fee'].'"');
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<div class="well well-small">
    <p>
        The registration fee includes welcome reception, seminar sessions, abstract &progamme book, CD-ROM and refreshment. One registration is required for each paper submitted. Accepted full paper will be published in Journal of Mathematical and Fundamental Sciences (Indexed by SCOPUS).
    </p>    
Registration fund should be transferred to the committee through the account: <br />
<table class="table">
<tbody>
<tr>
<td>Bank Name</td>
<td>:</td>
<td>Bank Negara Indonesia</td>
</tr>
<tr>
<td>Bank Code &nbsp;&nbsp;</td>
<td>:</td>
<td>N/A &nbsp;</td>
</tr>
<tr>
<td>Branch Name</td>
<td>:</td>
<td>&nbsp;Perguruan Tinggi Bandung (Indonesia)</td>
</tr>
<tr>
<td>Branch Code</td>
<td>:</td>
<td>N/A &nbsp;</td>
</tr>
<tr>
<td>Branch Address</td>
<td>:</td>
<td>Jl. Tamansari No. 80 Bandung – Indonesia &nbsp; &nbsp;&nbsp;</td>
</tr>
<tr>
<td>Account Name</td>
<td>:</td>
<td>Penampungan-PPM SITH &nbsp; &nbsp;</td>
</tr>
<tr>
<td>Account Number</td>
<td>:</td>
<td>0901062011</td>
</tr>
<tr>
<td>swift&nbsp;</td>
<td>:</td>
<td>BNINIDJAPTB</td>
</tr>
</tbody>
</table>
</div>
<hr />
<?php $this->tmpl->control_open('Payment Reciept'); ?>
<?php
    if(isset($file))
        echo $file.' <a class="btn btn-mini" download="'.$file.'" href="'.DIR_FILE_UPLOAD.'/'.$file.'">Download</a><br />';
?>
<div class="help-inline">
    If the registration fund have been transferred, please upload the payment receipt:
</div>
    <?php echo form_upload('file'); ?>
<?php $this->tmpl->control_close(); ?>
<div class="form-actions">
   <?=form_submit('submit', 'Save and Proceed with the payment','class="btn btn-primary"'); ?>
</div>
<?=form_close() ?>