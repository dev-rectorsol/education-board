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
				$map = directory_map(UPLOAD_FILE, FALSE, TRUE);
				$files = self::Concatenate_Filepaths($map);
				$fileData = self::getFileWithExt($files);
				$data['main_content'] = $this->load->view('media/list-view', $fileData, TRUE);
				$this->load->view('index', $data);
	}

	public function add(){
		$data['main_content'] = $this->load->view('media/add-view', '', TRUE);
		$this->load->view('index', $data);
	}

	public function get_model()
	{
			$map = directory_map(UPLOAD_FILE, FALSE, TRUE);
			$files = self::Concatenate_Filepaths($map);
			$fileData = self::getImageonly($files);
			echo $this->load->view('media/model-box', $fileData, TRUE);
	}
	public function Concatenate_Filepaths ($upload, $prefix = UPLOAD_FILE) {
		$return = array();

		foreach ($upload as $key => $file) {
	    if (is_array($file)) {
	    	$return = array_merge($return, self::Concatenate_Filepaths($file, $prefix . '/' . $key));
	    }
	    else {
					$return[] = $prefix . '/' . $file;
	    }
		}

		return $return;
	}

	public function getFileWithExt($path)
	{
		$filedata = array();
		foreach ($path as $value) {
			if ( preg_match('/(\.jpg|\.jpeg|\.png|\.bmp|\.gif)$/i', $value) )
				$filedata['image'][] = $value;
			else if( preg_match('/(\.mp4|\.mkv|\.avi|\.webm)$/i', $value ) )
				$filedata['video'][] = $value;
			else
				$filedata['other'][] = $value;
		}
		return $filedata;
	}

	public function getImageonly($path)
	{
		$filedata = array();
		foreach ($path as $value) {
			if ( preg_match('/(\.jpg|\.jpeg|\.png|\.bmp|\.gif)$/i', $value) )
				$filedata['image'][] = $value;
			}
		return $filedata;
	}




}
