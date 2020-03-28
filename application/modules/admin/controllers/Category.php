<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
<<<<<<< Updated upstream
        {
                parent::__construct();
                 $this->load->model('Common_model');
			if($this->session->userdata('role')!="a"){
          redirect(base_url() . 'auth', 'refresh');
        }
        }
=======
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
>>>>>>> Stashed changes
	public function index()
	{
		$data= array();
        $data['page'] ='Category';
<<<<<<< Updated upstream
        $data['tag']=  $this->Common_model->select('tags'); 
        $data['aim']=  $this->Common_model->select('category'); 
=======
        $data['tag']=  $this->Common_model->select('tags');
        $data['aim']=  $this->Common_model->select('category');
>>>>>>> Stashed changes
		$data['main_content']= $this->load->view('category/add',$data, true);
		$this->load->view('index',$data);
	}
    public function Add()
<<<<<<< Updated upstream
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
=======
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
>>>>>>> Stashed changes
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
