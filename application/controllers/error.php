<?php
class Error extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    function index(){
        $this->error_priv();
    }
    function error_priv(){
        $this->tmpl->front('error/error_priv');
    }
}
