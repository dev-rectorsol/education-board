<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


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
  }
	public function index()
	{
		$data= array();
		$data['page'] ='Dashboard';
		$data['main_content']= $this->load->view('home',$data, true);
		$this->load->view('index',$data);
	}


}
