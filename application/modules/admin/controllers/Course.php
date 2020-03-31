<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('Common_model');
			$this->load->model('Course_model');
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
		$data['course']=  $this->Course_model->select('course');

		$data['main_content']= $this->load->view('course/viewCourse',$data, true);
		$this->load->view('index',$data);
	}
		public function ViewCourseGrid()
	{
		$data= array();
		$data['page'] ='Course';
		$data['course']=  $this->Course_model->select('course');

		$data['main_content']= $this->load->view('course/viewCourseGrid',$data, true);
		$this->load->view('index',$data);
	}
	 public function Add()
	{
		if($_POST){
			 $data1=$this->security->xss_clean($_POST);
		 $max= $this->Course_model->getMaxId();
           $max =(int)substr($max,1);
           $id= "C".($max+1);
         $course=[
			   'courseid' =>$id,
            'name' => $data1['coursename'],
            'description' => $data1['description'],
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
	public function Delete($id)
	{
            $data1=['id'=> $id];
            $this->Common_model->delete($data1,'course');
            redirect(base_url() . 'admin/Category', 'refresh');
    }
}
