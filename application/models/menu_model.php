<?php
class Menu_model extends CI_Model {
    
    var $table_name='menu';
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function desc()
    {
        $query=$this->db->query('DESC '.$this->table_name);
        return $query->result_array();
    }
    
    function get_split($var,$role)
    {
        $role_selected=explode('|',$var);
        foreach($role as $k=>$r):
            $role[$k]['check']=FALSE;
            foreach($role_selected as $rs):
                if($r['id_role']==$rs)$role[$k]['check']=TRUE;
            endforeach;
        endforeach;
        return $role;
    }
    function get_join($var,$role)
    {
        $hasil='';
        $role_selected=explode('|',$var);
        foreach($role as $r):
            foreach($role_selected as $rs):
                if($r['id_role']==$rs):
                    $hasil.=$r['role'].' ';
                endif;
            endforeach;
        endforeach;
        return $hasil;
    }
    
    function get_menu_name(){
        $this->db->select('id, menu');
        $result=$this->db->get($this->table_name)->result_array();
        $menu=array('-');
        foreach($result as $r){
            $menu[$r['id']]=$r['menu'];
        }
        return $menu;
    }

    function get_a()
    {
        $this->db->order_by("parent_id, order ASC"); 
        $result = $this->db->get($this->table_name)->result_array();
        $role = $this->db->get('role')->result_array();
        foreach ($result as $k=>$res) {
            $result[$k]['role']=$this->get_join($res['role_id'], $role);
        }
        return $result;
    }

    function count_a()
    {
        $query = $this->db->get($this->table_name);
        return $query->num_rows();
    }
    
    function count_s($clause)
    {
        $query = $this->db->get_where($this->table_name,$clause);
        return $query->num_rows();
    }
    function get_s($clause,$limit=null,$offset=null)
    {
        $this->db->order_by("parent_id, order ASC"); 
        $query = $this->db->get_where($this->table_name,$clause,$limit,$offset);
        $result = $query->result_array();
        $role = $this->db->get('role')->result_array();
        foreach ($result as $k=>$res) {
            $result[$k]['role']=$this->get_join($res['role_id'], $role);
        }
        return $result;
    }
    
    function get_id($id)
    {
        $query = $this->db->get_where($this->table_name,array('id'=>$id));
        return $query->row_array();
    }
    function get_one($clause)
    {
        $query = $this->db->get_where($this->table_name,$clause);
        return $query->row_array();
    }

    function ins($data,$var)
    {
        $data['role_id']='';
        foreach ($var as $role_id) {
            $data['role_id'].=$role_id.'|';
        }
        $this->db->insert($this->table_name, $data);
    }
    function ins_b($data)
    {
        $this->db->insert_batch($this->table_name, $data);
    }

    function upd($data,$clause,$var)
    {
        if(!is_array($clause))$clause=array('id'=>$clause);
        $data['role_id']='';
        foreach ($var as $role_id) {
            $data['role_id'].=$role_id.'|';
        }
        $this->db->update($this->table_name, $data, $clause);
    }
    
    function upd_b($data,$clause)
    {
        $this->db->update_batch($this->table_name, $data, $clause);
    }
    
    function del($clause)
    {
        $menu=$this->db->get_where($this->table_name, array('id'=>$clause))->row_array();
        if($menu['parent_id']==0){
            $this->db->delete($this->table_name, array('parent_id'=>$clause));
        }
        $this->db->delete($this->table_name,array('id'=>$clause));
    }

}
?>
