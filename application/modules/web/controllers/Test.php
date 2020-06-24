<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common_model');
	}

	public function index() {

	}
	public function comming(){
		$this->load->view('comming-soon');
	}
}

?>
