<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Term extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('term_model');
        $this->load->model('task_model');
        $this->scripts[]='bootstrap.min';
        $this->scripts[]='script';
        $this->styles[]='bootstrap.min';
        $this->title="ODOJ (beta)";
    }
    function index($term_id=NULL){
        $this->header=$this->load->view('template/front/navbar',TRUE);
        if($term_id){
            $this->today($term_id);
        }else{
            $data['terms']=$this->term_model->get_all_terms();
            $this->load->view('all_terms',$data);
        }
    }
    function init(){
        if($_POST){
            // print_r($_POST);
            $juz=$this->input->post('juz');
            $juz_readers=array();
            foreach ($juz as $key => $value) {
                $juz_readers[$key]=explode(',', $value);
            }
            $term_data=array(
                'juz'=>$juz_readers,
                'group_id'=>$this->input->post('group_id')
            );
            // print_r($term_data);
            $term_id=$this->task_model->init($term_data);
            redirect(base_url('term/today/'.$term_id));
        }else{
            $this->header=$this->load->view('template/front/navbar',TRUE);
            $data['action']="";
            $this->load->view('init',$data);
        }
    }
    function today($term_id){
        if($_POST){
            // print_r($_POST);
            $reader        =$this->input->post('reader');
            $term_id       =$this->input->post('term_id');
            $extend_juz    =$this->input->post('extend');
            $extend_reader =$this->input->post('extend_reader');
            if($reader){
                $this->task_model->progress($term_id,$reader);
                redirect(base_url('term/today/'.$term_id.'?export=1'));
            }
            if($extend_juz)$this->task_model->extend($term_id,$extend_reader,$extend_juz);
        }
            $this->header=$this->load->view('template/front/navbar',TRUE);
            $data['group_report']=$this->task_model->report_term($term_id);
            $data['term']=$this->term_model->get_term($term_id);
            $this->title.=' - '.$data['term']['group_id'];
            $data['tasks']=$this->task_model->today($term_id);
            $data['members']=$this->task_model->members($term_id);
            $data['action']=base_url('term/today/'.$term_id);
            $data['action_update']=base_url('term/update_batch/'.$term_id);
            $data['hidden']['term_id']=$term_id;
            $this->load->view('today_tasks',$data);
    }
    function lapor($term_id){
            $this->header=$this->load->view('template/front/navbar',TRUE);
            $data['group_report']=$this->task_model->report_term($term_id);
            $data['term']=$this->term_model->get_term($term_id);
            $this->title.=' - '.$data['term']['group_id'];
            $data['tasks']=$this->task_model->today($term_id);
            $data['members']=$this->task_model->members($term_id);
            $this->load->view('lapor',$data);        
    }
    function update_batch($term_id){
        if($_POST){
            $term_id       =$this->input->post('term_id');
            $update_reader =$this->input->post('update_reader');
            $update_juz    =$this->input->post('update_juz');
            $update        =$this->task_model->update_batch($term_id,$update_reader,$update_juz);
        }
        redirect(base_url('term/today/'.$term_id));
    }
    function export($term_id){
        $this->header=$this->load->view('template/front/navbar',TRUE);
        $data['term']=$this->term_model->get_term($term_id);
        $data['tasks']=$this->task_model->today($term_id);
        $this->load->view('export',$data);        
    }
    function edit($task_id){
        $data['task']=$this->task_model->get_task($task_id);
        $data['status']=json_decode($data['task']->status);
        $data['action']=base_url('term/update_task/'.$task_id);
        $data['hidden']['term_id']=$data['task']->term_id;
        $this->load->view('edit',$data);        
    }
    function update_task($task_id){
        if($_POST){
            $term_id  =$this->input->post('term_id');
            $status  =$this->input->post('status');
            $this->task_model->update_task($task_id,$status);
            redirect(base_url('term/today/'.$term_id.'?tab=report'));
        }
    }
}