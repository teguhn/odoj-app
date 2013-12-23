<?php
class Role_model extends CI_Model {
    
    var $table_name='role';
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function desc()
    {
        $query=  $this->db->query('DESC '.$this->table_name);
        return $query->result_array();
    }
    
    function get_a()
    {
        $query = $this->db->get($this->table_name);
        return $query->result_array();
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
        $query = $this->db->get_where($this->table_name,$clause,$limit,$offset);
        return $query->result_array();
    }
    
    function get_id($id)
    {
        $query = $this->db->get_where($this->table_name,array('id_role'=>$id));
        return $query->row_array();
    }

    function ins($data)
    {
        $this->db->insert($this->table_name, $data);
    }
    function ins_b($data)
    {
        $this->db->insert_batch($this->table_name, $data);
    }

    function upd($data,$clause)
    {
        if(!is_array($clause))$clause=array('id_role'=>$clause);
        $this->db->update($this->table_name, $data, $clause);
    }
    
    function upd_b($data,$clause)
    {
        $this->db->update_batch($this->table_name, $data, $clause);
    }
    
    function del($clause)
    {
        if(!is_array($clause))$clause=array('id_role'=>$clause);
        $this->db->delete($this->table_name, $clause);
    }

}
?>
