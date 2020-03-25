<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aim extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                 $this->load->model('Common_model');
			if($this->session->userdata('role')!="a"){
          redirect(base_url() . 'auth', 'refresh');
        }
        }
	public function index()
	{
		$data= array();
        $data['page'] ='Aim';
        $data['aim']=  $this->Common_model->select('aim'); 
		$data['main_content']= $this->load->view('Aim/add',$data, true);
		$this->load->view('index',$data);
	}
    public function Add()
	{

       
         $aim=[
            'title' => $_POST['name'],
        
        ];
            $this->Common_model->insert($aim,'aim');
            redirect(base_url() . 'admin/Aim', 'refresh');
	}
 public function Delete($id)
	{
            $data1=['id'=> $id];
            $this->Common_model->delete($data1,'aim');
            redirect(base_url() . 'admin/Aim', 'refresh');
    }
    public function Edit($id)
	{
             $aim=[
            'title' => $_POST['name'],
        
        ];
           $this->Common_model->update($aim,'id',$id,'aim');
            redirect(base_url() . 'admin/Aim', 'refresh');
	}
}
