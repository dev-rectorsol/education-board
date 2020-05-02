<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {


	public function __construct()
  {
      parent::__construct();
			if(check()){
				if(!isAdmin($this->session->userdata('roles')))
					redirect(base_url(), 'refresh');
      }else{
				 	redirect(base_url(), 'refresh');
			}
			$this->load->model('Common_model');
			$this->load->model('user');
  }
	public function index()
	{
		$data= array();
		$data['page'] ='Add Student';
		$data['main_content']= $this->load->view('home',$data, true);
		$this->load->view('index',$data);
	}

	public function view()
	{
		$data= array();
		$data['page'] ='All Students';
		$data['users'] = $this->user->all();
		$data['main_content']= $this->load->view('user/view',$data, true);
		$this->load->view('index',$data);
	}


}
