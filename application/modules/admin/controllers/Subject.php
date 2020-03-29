<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('Common_model');
	}
	public function index()
	{
		$data= array();
		$data['page'] ='Subject';
		$data['course']=  $this->Common_model->select('course');
		
		$data['main_content']= $this->load->view('Subject/addSubject',$data, true);
		$this->load->view('index',$data);
	}
	public function View()
	{
		$data= array();
		$data['page'] ='Course';
		$data['subject']=  $this->Common_model->select('subject');
        $data['course']=  $this->Common_model->select('course');
		$data['main_content']= $this->load->view('Subject/view',$data, true);
		$this->load->view('index',$data);
	}
	
	 public function Add()
	{
		if($_POST){
			 $data1=$this->security->xss_clean($_POST);
         $subject=[
             'name' => $data1['name'],
            'course' => $data1['course'],
            'description' => $data1['description'],
        ];
		  $this->Common_model->insert($subject,'subject');
		  
			redirect(base_url() . 'admin/Subject', 'refresh');
	}
    }

    	 public function Update($id)
	{
		if($_POST){
			 $data1=$this->security->xss_clean($_POST);
         $subject=[
             'name' => $data1['name'],
            'course' => $data1['course'],
            'description' => $data1['description'],
        ];
		  $this->Common_model->update($subject,'id',$id,'subject');
		  
			redirect(base_url() . 'admin/Subject', 'refresh');
	}
    }
     public function Delete($id)
	{
            $data1=['id'=> $id];
            $this->Common_model->delete($data1,'subject');
            redirect(base_url() . 'admin/Category', 'refresh');
    }
}
