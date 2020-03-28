<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Authentication extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->library(['auth', 'session']);
        $this->load->library('form_validation');
    }


    public function index() {
      // echo print_r($this->session->userdata());exit;
      if(check()){
        redirect(base_url(), 'refresh');
      }
      if($_POST){
        $temp = $this->auth->login($_POST);
        if($temp['status'] == true){
          redirect(base_url(), 'refresh');
        }else{
          $this->session->set_flashdata($temp);
          $this->load->view('Login');
        }
      }else {
        $this->load->view('Login');
      }
    }


    function logout(){
        $this->session->sess_destroy();
        redirect(base_url() . 'authentication', 'refresh');
    }
}
