<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriber extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common_model');
	}

	public function index() {
		if ($_POST) {
			$result = $this->security->xss_clean($_POST);
			$data=['email'=>$result['email']];
			if ($this->common_model->insert($data, 'subscriber')) {
				$this->session->set_flashdata(array('error' => 0, 'msg' => 'Thank you for subscribing. Now we will send further new updates on your email'));
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}else{
				$this->session->set_flashdata(array('error' => 1, 'msg' => 'Action  Failed! for your  subscribing, please try again.'));
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
		}
	}

}

?>
