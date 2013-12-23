<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of template
 *
 * @author teguhn
 */
class Tmpl {

    // Constructor
    function __construct() {
        $this->_ci = &get_instance();
    }

    // Default Template
    function display($template, $data = null) {
        $data['_title']='Administrator';
        $data['_js']=array('jquery-ui','bootstrap.min');
        $data['_css']=array('reset','bootstrap.min','style','bootstrap-responsive.min');
        
        $data['_navbar'] = $this->_ci->load->view('template/admin/navbar', $data, true);
        $data['_sidebar'] = $this->_ci->load->view('template/admin/sidebar', $data, true);
        $data['_content'] = $this->_ci->load->view($template, $data, true);

        $this->_ci->load->view('/template/head.php', $data);
        $this->_ci->load->view('/template/admin/main.php', $data);
        $this->_ci->load->view('/template/foot.php', $data);
    }
    function front($template, $data = null) {
        $data['_title']='ISTB 2013 Registration';
        $data['_js']=array('jquery-ui','bootstrap.min');
        $data['_css']=array('reset','bootstrap.min','bootstrap-responsive.min','front');
        
        $data['_navbar']='';
//        $data['_navbar'] = $this->_ci->load->view('template/front/navbar', $data, true);
//        $data['_sidebar'] = '';
        $data['_sidebar'] = $this->_ci->load->view('template/front/sidebar', $data, true);
        $data['_content'] = $this->_ci->load->view($template, $data, true);

        $this->_ci->load->view('/template/head.php', $data);
        $this->_ci->load->view('/template/front/main.php', $data);
        $this->_ci->load->view('/template/foot.php', $data);
    }
    
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
	$this->_ci->load->library('pagination');
        $config['uri_segment']=$segment;
	$config['full_tag_open'] = '<div class="pagination"><ul>';
	$config['full_tag_close'] = '</ul></div>';
	$config['num_tag_open'] = '<li>';
	$config['num_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="active"><a href="'.current_url().'">';
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
	$this->_ci->pagination->initialize($config);
    }

}

/* End of file main.php */
/* Location: ./application/libraries/main.php */