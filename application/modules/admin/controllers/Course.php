<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

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
		$data['page'] ='Course';
		$data['tag']=  $this->Common_model->select('tags'); 
		$data['category']=  $this->Common_model->select('category'); 
		$data['main_content']= $this->load->view('course/addCourse',$data, true);
		$this->load->view('index',$data);
	}
	public function ViewCourse()
	{
		$data= array();
		$data['page'] ='Course';
		$data['course']=  $this->Common_model->select('course'); 
		
		$data['main_content']= $this->load->view('course/viewCourse',$data, true);
		$this->load->view('index',$data);
	}
		public function ViewCourseGrid()
	{
		$data= array();
		$data['page'] ='Course';
		$data['course']=  $this->Common_model->select('course'); 
		
		$data['main_content']= $this->load->view('course/viewCourseGrid',$data, true);
		$this->load->view('index',$data);
	}
	 public function Add()
	{

       
         $course=[
            'name' => $_POST['coursename'],
            'description' => $_POST['description'],
        ];
		  $id =   $this->Common_model->insert($course,'course');
		  
		  $tag=$_POST['tag'];
		  foreach($tag as $row){
			$data=[
            'root' => $id,
			'port' => $row,
			'type' =>'tag'
        ];
		 $this->Common_model->insert($data,'indexing');  
		  }
		    $category=$_POST['category'];
		  foreach($category as $row){
			$data=[
            'root' => $id,
			'port' => $row,
			'type' =>'category'
        ];
		 $this->Common_model->insert($data,'indexing');  
		  }
            redirect(base_url() . 'admin/Course', 'refresh');
    }

}
