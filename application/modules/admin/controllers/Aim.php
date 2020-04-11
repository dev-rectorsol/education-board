<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aim extends CI_Controller {

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
	}
	public function index()
	{
		$data= array();
        $data['page'] ='Aim';
        $data['aim']=  $this->Common_model->select('aim');
		$data['main_content']= $this->load->view('aim/add',$data, true);
		$this->load->view('index',$data);
	}
    public function Add()
	{
	if($_POST){
			 $data1=$this->security->xss_clean($_POST);

         $aim=[
            'title' => $data1['name'],

        ];
            $this->Common_model->insert($aim,'aim');
			redirect(base_url() . 'admin/aim', 'refresh');
	}
	}
 public function Delete($id)
	{
            $data1=['id'=> $id];
            $this->Common_model->delete($data1,'aim');
            redirect(base_url() . 'admin/aim', 'refresh');
    }
    public function Edit($id)
	{
		if($_POST){
			 $data1=$this->security->xss_clean($_POST);
		$aim=[
            'title' => $data1['name'],
        ];
           $this->Common_model->update($aim,'id',$id,'aim');
			redirect(base_url() . 'admin/aim', 'refresh');
	}
	}
}
