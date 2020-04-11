<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_upload extends CI_Controller {

  	public function __construct()
  	{
  		parent::__construct();
      $this->load->model('common_model');
  	}
    public function index(){
      if ($_FILES) {
        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $allow = array("jpg", "png", "jpeg", "gif");
        if (in_array($extension , $allow)) {
          $path = $this->common_model->upload_image($_FILES['file']['size']);
          echo json_encode($path);
        }else{
          echo json_encode(array('status' => 0, 'msg' => 'not allow  to upload '.$extension.' file type.'));
        }
      }else{
        echo json_encode(array('status' => 0, 'msg' => 'only file upload'));
      }
    }
}
