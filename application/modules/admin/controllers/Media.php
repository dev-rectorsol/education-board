<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {


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
		$this->load->helper('directory');
  }
	public function index()
	{
        $dir ='uploads';
				$map = directory_map($dir, FALSE, TRUE);
				$data['files'] = self::Concatenate_Filepaths($map);
				$data['main_content'] = $this->load->view('media/list-view', $data, TRUE);
				$this->load->view('index', $data);
	}

	function Concatenate_Filepaths ($upload, $prefix = '') {
		$return = array();

		foreach ($upload as $key => $file) {
	    if (is_array($file)) {
	    	$return = array_merge($return, self::Concatenate_Filepaths($file, $prefix . '/' . $key . '/'));
	    }
	    else {
	        $return[] = $prefix . $file;
	    }
		}

		return $return;
	}


}
