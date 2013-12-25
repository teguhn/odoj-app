<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller {
    function __construct(){
        parent::__construct();
        // $this->load->model('feedback_model');
    }
    function add(){
    	$this->layout=false;
    	$data=array(
    		'email'=>$this->input->post('email_feedback'),
    		'feedback'=>$this->input->post('pesan_feedback')
		);
		if($this->db->insert('feedback',$data)){
			$response=array(
				'status'=>1,
				'msg'=>'Terima kasih atas feedback Anda. Mohon doanya semoga web ini bermanfaat.'
			);
		}else{
			$response=array(
				'status'=>1,
				'msg'=>'Terima kasih atas feedback Anda. Mohon doanya semoga web ini bermanfaat.'
			);			
		}
    	echo json_encode($response);
    }
    function get_all(){
    	$result=$this->db->get('feedback')->result_array();
    	echo '<ul>';
    	foreach ($result as $fb) {
    		echo '<li>'.$fb['email'].': '.$fb['feedback'].' ('.$fb['timestamp'].')</li>';
    	}
    	echo '</ul>';
    }
}