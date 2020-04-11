<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  	public function __construct()
  	{
  		parent::__construct();
      if(check()){
        if(isAdmin($this->session->userdata('roles')))
          redirect(base_url() . 'admin', 'refresh' );
        else
          redirect(base_url() . 'app', 'refresh' );
      }else {
        redirect(base_url() . 'home', 'refresh' );
      }
  	}
    public function index(){}
}

/* End of file Home.php */
/* Location: ./application/modules/web/controllers/Home.php */ ?>
