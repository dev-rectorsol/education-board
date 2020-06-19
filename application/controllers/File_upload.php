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
        $allowImage = array("jpg", "png", "jpeg", "gif");
        $allowPdf = array("pdf", "doc", "ppt");
        if (in_array($extension , $allowImage)) {
          $path = $this->common_model->upload_image($_FILES['file']['size']);
          if(!empty($path)) {
            echo json_encode($path);
          }
        } else if(in_array($extension, $allowPdf)) {

          $path = $this->common_model->upload_Pdf($_FILES['file']['size']);
          if(!empty($path)) {
            echo json_encode($path);
          }
        } else {

          echo json_encode(array('status' => 0, 'msg' => 'not allow  to upload '.$extension.' file type.'));

        }
      }else{
        echo json_encode(array('status' => 0, 'msg' => 'only file upload'));
      }
    }
}
