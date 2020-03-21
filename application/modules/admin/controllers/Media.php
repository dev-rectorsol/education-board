<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

	
	public function __construct()
        {
                parent::__construct();
			
        }
	public function index()
	{
        $dir ="upload";

// Sort in ascending order - this is default
$data['upload'] = scandir($dir);

$this->load->view('media',$data);
	}


}
