<?php
class Term_model extends CI_Model {
    
    var $table_name='term';
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function add(){
		$data=array('start_date'=>date('Y-m-d'));
		$this->db->insert($this->table_name,$data);
		return $this->db->insert_id();
    }
    function get_term($term_id){
        $term=$this->db->where('id_term',$term_id)->get($this->table_name)->row_array();
        return $term;
    }
    function get_all_terms(){
        $terms=$this->db->order_by('id_term','DESC')->get($this->table_name)->result_array();
        return $terms;
    }
}