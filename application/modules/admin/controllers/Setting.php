<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class setting extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			if(check()){
				if(!isAdmin($this->session->userdata('roles')))
					redirect(base_url(), 'refresh');
      }else{
				 	redirect(base_url(), 'refresh');
			}
            $this->load->model('common_model');
            $this->load->model('article_model');
	}
  public function index(){

  }
}
