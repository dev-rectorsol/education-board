<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

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
			$this->load->model('Common_model');
	}
>>>>>>> Stashed changes
	public function index()
	{
		$data= array();
		$data['page'] ='Course';
<<<<<<< Updated upstream
		$data['tag']=  $this->Common_model->select('tags'); 
		$data['category']=  $this->Common_model->select('category'); 
=======
		$data['tag']=  $this->Common_model->select('tags');
		$data['category']=  $this->Common_model->select('category');
>>>>>>> Stashed changes
		$data['main_content']= $this->load->view('course/addCourse',$data, true);
		$this->load->view('index',$data);
	}
	public function ViewCourse()
	{
		$data= array();
		$data['page'] ='Course';
<<<<<<< Updated upstream
		$data['course']=  $this->Common_model->select('course'); 
		
=======
		$data['course']=  $this->Common_model->select('course');

>>>>>>> Stashed changes
		$data['main_content']= $this->load->view('course/viewCourse',$data, true);
		$this->load->view('index',$data);
	}
		public function ViewCourseGrid()
	{
		$data= array();
		$data['page'] ='Course';
<<<<<<< Updated upstream
		$data['course']=  $this->Common_model->select('course'); 
		
=======
		$data['course']=  $this->Common_model->select('course');

>>>>>>> Stashed changes
		$data['main_content']= $this->load->view('course/viewCourseGrid',$data, true);
		$this->load->view('index',$data);
	}
	 public function Add()
	{

<<<<<<< Updated upstream
       
=======

>>>>>>> Stashed changes
         $course=[
            'name' => $_POST['coursename'],
            'description' => $_POST['description'],
        ];
		  $id =   $this->Common_model->insert($course,'course');
<<<<<<< Updated upstream
		  
=======

>>>>>>> Stashed changes
		  $tag=$_POST['tag'];
		  foreach($tag as $row){
			$data=[
            'root' => $id,
			'port' => $row,
			'type' =>'tag'
        ];
<<<<<<< Updated upstream
		 $this->Common_model->insert($data,'indexing');  
=======
		 $this->Common_model->insert($data,'indexing');
>>>>>>> Stashed changes
		  }
		    $category=$_POST['category'];
		  foreach($category as $row){
			$data=[
            'root' => $id,
			'port' => $row,
			'type' =>'category'
        ];
<<<<<<< Updated upstream
		 $this->Common_model->insert($data,'indexing');  
=======
		 $this->Common_model->insert($data,'indexing');
>>>>>>> Stashed changes
		  }
            redirect(base_url() . 'admin/Course', 'refresh');
    }

}
