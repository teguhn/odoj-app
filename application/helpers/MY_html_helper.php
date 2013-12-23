<?php
    function table_std()
    {
        $tmpl=array(
            'table_open'          => '<table class="table table-striped">',

            'heading_row_start'   => '<tr>',
            'heading_row_end'     => '</tr>',
            'heading_cell_start'  => '<th>',
            'heading_cell_end'    => '</th>',

            'row_start'           => '<tr>',
            'row_end'             => '</tr>',
            'cell_start'          => '<td>',
            'cell_end'            => '</td>',

            'row_alt_start'       => '<tr>',
            'row_alt_end'         => '</tr>',
            'cell_alt_start'      => '<td>',
            'cell_alt_end'        => '</td>',

            'table_close'         => '</table>'
        );
        return $tmpl;
    }
    function paging($config,$segment=3)
    {
        $_ci = &get_instance();
	$_ci->load->library('pagination');
        $config['uri_segment']=$segment;
	$config['full_tag_open'] = '<div class="pagination"><ul>';
	$config['full_tag_close'] = '</ul></div>';
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="active"><a href="#">';
	$config['cur_tag_close'] = '</a></li>';
	$config['prev_link'] = '&lt;';
	$config['prev_tag_open'] = '<li>';
	$config['prev_tag_close'] = '</li>';
	$config['next_link'] = '&gt;';
	$config['next_tag_open'] = '<li>';
	$config['next_tag_close'] = '</li>';
	$config['first_link'] = 'First';
	$config['first_tag_open'] = '<li>';
	$config['first_tag_close'] = '</li>';
	$config['last_link'] = 'Last';
	$config['last_tag_open'] = '<li>';
	$config['last_tag_close'] = '</li>';
	$_ci->pagination->initialize($config);
    }
    // Alert templates
    function alert($type,$msg,$uri='')
    {
        $_ci = &get_instance();
        switch ($msg) {
            case 'add':$msg='Data telah ditambahkan';break;
            case 'edit':$msg='Data telah diubah';break;
            case 'delete':$msg='Data telah dihapus';break;
            case 'notfound':$msg='Data tidak ditemukan';break;
            default:break;
        }
	$alert='<div class="alert alert-'.$type.' fade-out">
            <button type="button" class="close" data-dismiss="alert">&times;</button>'.$msg.'</div>';
        $_ci->session->set_flashdata('alert',$alert);
        if($uri!='')redirect($uri);
    }

?>
