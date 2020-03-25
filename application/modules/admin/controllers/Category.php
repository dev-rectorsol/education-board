<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
        $data['page'] ='Category';
        $data['tag']=  $this->Common_model->select('tags'); 
        $data['aim']=  $this->Common_model->select('category'); 
		$data['main_content']= $this->load->view('category/add',$data, true);
		$this->load->view('index',$data);
	}
    public function Add()
	{

       
         $aim=[
            'name' => $_POST['name'],
            'parent' => $_POST['parent'],
        ];
            $this->Common_model->insert($aim,'category');
            redirect(base_url() . 'admin/Category', 'refresh');
    }
    
      public function AddTag()
	{

       
         $tag=[
            'title' => $_POST['name'],
           
        ];
            $this->Common_model->insert($tag,'tags');
            redirect(base_url() . 'admin/Category', 'refresh');
	}
 public function Delete($id)
	{
            $data1=['id'=> $id];
            $this->Common_model->delete($data1,'category');
            redirect(base_url() . 'admin/Category', 'refresh');
    }
    public function Edit($id)
	{
             $aim=[
            'name' => $_POST['name'],
            'parent' => $_POST['parent'],
        ];
           $this->Common_model->update($aim,'id',$id,'category');
            redirect(base_url() . 'admin/Category', 'refresh');
	}
}
