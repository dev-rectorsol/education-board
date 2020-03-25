<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct()
        {
                parent::__construct();
			if($this->session->userdata('role')!="a"){
          redirect(base_url() . 'auth', 'refresh');
        }
        }
	public function index()
	{
		$data= array();
		$data['page'] ='Dashboard';
		$data['main_content']= $this->load->view('home',$data, true);
		$this->load->view('index',$data);
	}


}
