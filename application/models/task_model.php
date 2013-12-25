<?php
class Task_model extends CI_Model {
    
    var $table_name='task';
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function progress($term_id,$reader){
        $offset = $this->offset_juz($term_id);
        $where=array('reader'=>$reader,'term_id'=>$term_id);
        $latest_task=$this->db->get_where($this->table_name,$where)->row_array();
        $juz_now=($latest_task['start_juz']+$offset)%30;
        if($juz_now==0)$juz_now=30;
        $latest_task['status']=json_decode($latest_task['status']);
        $latest_task['status'][$juz_now-1]++;
        $latest_task['status']=json_encode($latest_task['status']);
        return $this->db->update($this->table_name,$latest_task,$where);
    }
    function extend($term_id,$reader,$juz_read){
        $where=array('reader'=>$reader,'term_id'=>$term_id);
        $latest_task=$this->db->get_where($this->table_name,$where)->row_array();
        $latest_task['status']=json_decode($latest_task['status']);
        foreach ($juz_read as $juz) {
            $latest_task['status'][$juz-1]++;
        }
        $latest_task['status']=json_encode($latest_task['status']);
        return $this->db->update($this->table_name,$latest_task,$where);
    }
    function report_term($term_id){
        $tasks=$this->db->where('term_id',$term_id)->get($this->table_name)->result_array();
        $juz=array();
        for($i=0;$i<30;$i++){
            $juz[]=0;
        }
        foreach ($tasks as $task) {
            $task_statuses=json_decode($task['status']);
            for($i=0;$i<30;$i++){
                $juz[$i]+=$task_statuses[$i];
            }
        }
        $result['khatam']=min($juz);
        $result['juz_read']=array_sum($juz);
        return $result;
    }
    function report_individual($start_juz,$juz_now,$task_statuses){
        $result=array('hutang'=>array());
        for($i=$start_juz;$i<=$juz_now;$i++){
            if($task_statuses[$i-1]==0)
            $result['hutang'][]=$i;
        }
        $result['khatam']=min($task_statuses);
        $result['juz_read']=array_sum($task_statuses);
        return $result;
    }
    function init($data){
        $term_data=array(
            'start_date'=>date("Y-m-d"),
            'group_id'=>$data['group_id']
        );
        $this->db->insert('term',$term_data);
        $term_id=$this->db->insert_id();
        $status=array();
        for($i=0;$i<30;$i++){
            $status[]=0;
        }
        $status_json=json_encode($status);
        foreach ($data['juz'] as $juz=>$readers) {
            foreach ($readers as $reader) {
                if($reader){
                    $task=array(
                            'term_id'=>$term_id,
                            'start_juz'=>$juz,
                            'reader'=>$reader,
                            'status'=>$status_json
                        );
                    $this->db->insert($this->table_name,$task);
                }
            }       
        }
        return $term_id;       
    }
    function today($term_id){
        $offset = $this->offset_juz($term_id);
        $juz=array();
        $tasks=$this->db->get_where($this->table_name,array('term_id'=>$term_id))->result_array();
        foreach ($tasks as $key => $task) {
            $status=json_decode($task['status']);
            $juz_now=($task['start_juz']+$offset)%30;
            if($juz_now==0)$juz_now=30;
            $juz[$juz_now][]=array(
                'name'=>$task['reader'],
                'status'=>$status[$juz_now-1],
                'report'=>$this->report_individual($task['start_juz'],$juz_now,$status)
            );
        }
        return $juz;
    }
    function offset_juz($term_id){
        $term=$this->db->select('start_date')->get_where('term',array('id_term'=>$term_id))->row_array();
        $start_date = strtotime($term['start_date']);
        $curr_date = strtotime(date('Y/m/d'));
        $offset = floor(($curr_date-$start_date)/60/60/24);
        return $offset;        
    }
    function members($term_id){
        $where=array('term_id'=>$term_id);
        $tasks=$this->db->get_where($this->table_name,$where)->result_array();
        $members=array();
        foreach ($tasks as $task) {
            $members[$task['reader']]=$task['reader'];
        }
        return $members;
    }
    function update_task($term_id,$update_reader,$update_juz){
        $where=array('reader'=>$update_reader,'term_id'=>$term_id);
        $task=$this->db->get_where($this->table_name,$where)->row_array();
        $offset=$this->offset_juz($term_id);
        $juz_now=($task['start_juz']+$offset)%30;
        if($juz_now==0)$juz_now=30;
        $delta=$update_juz-$juz_now;
        $task['start_juz']+=$delta;
        return $this->db->update($this->table_name,$task,$where);
    }
}