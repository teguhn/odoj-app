<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author teguhn
 */
class Access {

    /**
     * Constructor
     */
    public $info;

    function __construct() {
	$this->_ci = & get_instance();
    }

    /*
     * Cek Login user
     */

    function is_login() {
        $result=$this->_ci->session->userdata('is_login');        
        if($result){
            return true;
        }else{
            return false;
        }
    }
    function cek_login() {
        $result=$this->_ci->session->userdata('is_login');        
        if(!$result){
            $this->_ci->tmpl->alert('error','Please log in first.',base_url($this->class_uri));
        }
    }

    /*
     * Cek role user
     */

    function is_role($role) {
        $result=$this->_ci->session->userdata('id_role');        
        if($result==$role){
            return true;
        }else{
            return false;
        }
    }
    function cek($link){
        $result=$this->_ci->db->get_where('menu',array('link'=>$link))->row_array();
        $role_selected=explode('|',$result['role_id']);
        $boleh=FALSE;
        foreach($role_selected as $rs):
            if($this->is_role($rs))$boleh=TRUE;
        endforeach;
        if($boleh && $this->is_login()){
            return true;
        }else{
            return false;
        }
    }
    function cek_aman($link){
        if(!$this->cek($link)){
            redirect(base_url('error/error_priv'));
        }
    }
}

/* End of file access.php */
/* Location: ./application/libraries/access.php */