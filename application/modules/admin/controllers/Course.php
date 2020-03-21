<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

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
		$data['page'] ='Course';
		$data['main_content']= $this->load->view('course/addCourse',$data, true);
		$this->load->view('index',$data);
	}


}
