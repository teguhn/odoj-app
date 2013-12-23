<?php
class Profile_model extends CI_Model {
    
    var $table_name='profile';
    
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
    
    function get_a($sort_by='id_att', $sort_order='asc')
    {
        $this->db->order_by($sort_by, $sort_order);
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
    function count_email()
    {
        $this->db->group_by('email');
        $query = $this->db->get_where($this->table_name);
        return $query->num_rows();
    }
    function count_paid()
    {
        $query = $this->db->get_where($this->table_name);
        return $query->num_rows();
    }
    function get_s($clause,$limit=null,$offset=null,$sort_by='name', $sort_order='asc')
    {
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_by = array('name');
        $this->db->order_by($sort_by, $sort_order);
        $query = $this->db->get_where($this->table_name,$clause,$limit,$offset);
        return $query->result_array();
    }
    function get_search($clause,$limit=null,$offset=null,$sort_by='nama', $sort_order='asc')
    {
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('nama', 'username', 'email', 'role');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'nama';
        $this->db->join('role','role.id_role='.$this->table_name.'.role_id');
        $this->db->order_by($sort_by, $sort_order);
        $this->db->limit($limit,$offset);
        $this->db->like($clause);
        $query = $this->db->get($this->table_name);
        return $query->result_array();
    }
    
    function get_id($id)
    {
        $this->db->join('user','user.id_user='.$this->table_name.'.user_id','left');
        $query = $this->db->get_where($this->table_name,array('id_att'=>$id));
        return $query->row_array();
    }
    function get_one($clause)
    {
        $this->db->join('role','role.id_role='.$this->table_name.'.role_id');
        $query = $this->db->get_where($this->table_name,$clause);
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
        if(!is_array($clause))$clause=array('id_att'=>$clause);
        $this->db->update($this->table_name, $data, $clause);
    }
    
    function upd_b($data,$clause)
    {
        $this->db->update_batch($this->table_name, $data, $clause);
    }
    
    function del($clause)
    {
        if(!is_array($clause))$clause=array('id_att'=>$clause);
        $this->db->delete($this->table_name, $clause);
    }

}
?>
