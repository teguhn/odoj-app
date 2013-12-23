<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Term extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('term_model');
        $this->load->model('task_model');
        $this->scripts[]='bootstrap.min';
        $this->styles[]='bootstrap.min';
        $this->header=$this->load->view('template/front/navbar',TRUE);
    }
    function index($term_id=NULL){
        if($term_id){
            $this->get_today_tasks($term_id);
        }else{
            $data['terms']=$this->term_model->get_all_terms();
            $this->load->view('all_terms',$data);
        }
    }
    function init_term(){
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
            redirect(base_url('term/get_today_tasks/'.$term_id));
        }else{
            $data['action']="";
            $this->load->view('init',$data);
        }
    }
    function report_term($term_id){
        print_r($this->task_model->report_term($term_id));
    }
    function report_individual($term_id,$name){
        print_r($this->task_model->report_individual($term_id,$name));
    }
    function progress($term_id,$name){
        print_r($this->task_model->progress($term_id,$name));
    }
    function extend(){
        $juz=array();
            for($i=0;$i<10;$i++){
                $juz[$i]=1;
            }
        print_r($this->task_model->extend(2,'tiga',$juz));
    }
    function get_today_tasks($term_id){
        if($_POST){
            // print_r($_POST);
            $reader        =$this->input->post('reader');
            $term_id       =$this->input->post('term_id');
            $extend_juz    =$this->input->post('extend');
            $extend_reader =$this->input->post('extend_reader');
            if($reader)$this->task_model->progress($term_id,$reader);
            if($extend_juz)$this->task_model->extend($term_id,$extend_reader,$extend_juz);
        }
            $data['group_report']=$this->task_model->report_term($term_id);
            $data['term']=$this->term_model->get_term($term_id);
            $data['tasks']=$this->task_model->get_today_tasks($term_id);
            $data['action']="";
            $data['hidden']['term_id']=$term_id;
            $this->load->view('today_tasks',$data);
    }
}