<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('common_model');
			$this->load->model('course_model');
	}
	public function index()
	{
		$data= array();
		$data['page'] ='Add Course';
		$data['tag']=  $this->common_model->select('tags');
		$data['category']=  $this->common_model->select('category');
		$data['main_content']= $this->load->view('course/addCourse',$data, true);
		$this->load->view('index',$data);
	}
	public function ViewCourse()
	{
		$data= array();
		$data['page'] ='Course';
		$data['course']=  $this->course_model->select();
		$data['main_content']= $this->load->view('course/viewCourse',$data, true);
		$this->load->view('index',$data);
	}
	public function View($id)
	{
		$data= array();
		$data['page'] ='View Course';
		$data['course']=  $this->course_model->select_by_id($id);
		$data['sub']=  $this->course_model->select_Subject_by_id($id);
		$data['subject']=  $this->course_model->select_subject();
		$data['main_content']= $this->load->view('course/addSubject',$data, true);
		$this->load->view('index',$data);
	}
	public function AddSubject($id)
	{
		if($_POST){
			 $data1=$this->security->xss_clean($_POST);
			$count= $this->course_model->getMaxSerial($id);
			if($count == NULL){
				$count=0;
			}
		foreach($data1['subject'] as $row){
			 $course=[
			   'course_id' =>$id,
	          'subid' => $row,
	          'serial' => ++$count
		];
		 $this->common_model->insert($course,'course_meta');
		}
		redirect(base_url() . 'admin/Course/ViewCourse', 'refresh');
			}
	}
	 public function Add() {
		if($_POST){
			 $data=$this->security->xss_clean($_POST);
			 $id = $this->common_model->get_last_id('course');
			 if ($data['submit'] == 'publish') {
				 $course = [
            'course_id' => getCustomId($id, 'kalka'),
            'name' => $data['coursename'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'course_type' => $data['course_type'],
            'is_publish' => 1,
            'created_by' => $this->session->userdata('userID'),
            'created' => current_datetime()
        ];
			} else {
				$course = [
           'course_id' => getCustomId($id, 'kalka'),
           'name' => $data['coursename'],
					 'slug' => $data['slug'],
           'description' => $data['description'],
					 'course_type' => $data['course_type'],
					 'created_by' => $this->session->userdata('userID'),
					 'created' => current_datetime()
       	];
			}
		  $id =  $this->common_model->insert($course,'course');
			if ($id) {
			  $this->common_model->indexing($_POST, $course['course_id']);
				if ( isset($_POST['featureImage']) ) {
					// if added feature images
					$this->common_model->addThumb($_POST['featureImage'], $course['course_id']);
				}
			 	$this->session->set_flashdata(array('error' => 0, 'msg' => 'Course Create Done'));
			 	redirect(base_url('admin/course/edit/').$course['course_id'], 'refresh');
		 }  else {
			 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Course Creation Failed'));
			 redirect($_SERVER['HTTP_REFERER'], 'refresh');
		 }
	 }else{
		 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
		 redirect($_SERVER['HTTP_REFERER'], 'refresh');
	 }
  }

	public function edit($id){
		$data = array();
		$data['page'] = 'Edit Course';
		$data['tag']=  $this->common_model->select('tags');
		$data['category']=  $this->common_model->select('category');
		$data['course'] = $this->course_model->select_by_id($id);
		$data['image'] = $this->common_model->getThumByRoot($id);
		$data['indexcategory'] = $this->common_model->getIndexCategorys($id);
		$data['indextags'] = $this->common_model->getIndexTags($id);
		$data['main_content'] = $this->load->view('course/edit-view',$data, true);
		$this->load->view('index',$data);
	}

	public function update(){
		if($_POST){
			 $data=$this->security->xss_clean($_POST);
			 if ($data['submit'] == 'publish') {
				 $course = [
            'name' => $data['coursename'],
						'slug' => $data['slug'],
						'created_by' => $this->session->userdata('userID'),
            'description' => $data['description'],
						'course_type' => $data['course_type'],
            'is_publish' => 1
        ];
			} else if($data['submit'] == 'save') {
				$course = [
           'name' => $data['coursename'],
					 'slug' => $data['slug'],
					 'created_by' => $this->session->userdata('userID'),
           'description' => $data['description'],
					 'course_type' => $data['course_type'],
					 'is_publish' => 0,
       	];
			} else{
				$course = [
           'name' => $data['coursename'],
					 'slug' => $data['slug'],
					 'course_type' => $data['course_type'],
					 'created_by' => $this->session->userdata('userID'),
           'description' => $data['description']
       	];
			}
			if ( $this->common_model->update($course, 'course_id', $data['course_id'], 'course') ) {
			  $this->common_model->updateIndexing($_POST, $data['course_id']);
				if ( isset($_POST['featureImage']) ) {
					// if updated feature images
					$this->common_model->updateThumb($_POST['featureImage'], $data['course_id']);
				}

			 	$this->session->set_flashdata(array('error' => 0, 'msg' => 'Course Update Done'));
			 	redirect(base_url('admin/course/edit/').$data['course_id'], 'refresh');
		 }  else {
			 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Update Failed'));
			 redirect($_SERVER['HTTP_REFERER'], 'refresh');
		 }
	 }else{
		 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
		 redirect($_SERVER['HTTP_REFERER'], 'refresh');
	 }
	}
	public function Delete($id)
	{
      $data1=['course_id'=> $id];
      $this->common_model->delete($data1,'course');
			$this->session->set_flashdata(array('error' => 0, 'msg' => 'Data Deleted'));
      redirect(base_url() . 'admin/Category', 'refresh');
  }


	// curriculum

	public function curriculum($id) {
		$data = array();
		$data['page'] = 'Edit Course';
		$data['course'] = $this->course_model->select_by_id($id);
		$data['curriculum'] = $this->course_model->select_course_curriculum_by_id($id);
		$data['indexcategory'] = $this->common_model->getIndexCategorys($id);
		$data['image'] = $this->common_model->getThumByRoot($id);
		$data['main_content'] = $this->load->view('course/add-curriculum',$data, true);
		$data['script'] = $this->load->view('layout/__curriculum.php', $data, true);
		$this->load->view('index',$data);
	}

	public function add_curriculum() {
	 	if($_POST){

			$data=$this->security->xss_clean($_POST);
			// Check Data Is Already apc_exists
			$this->course_model->check_curriculum($data['course_id']);

			if ($data['submit'] == 'publish') {
				$course = [
					 'course_id' => $data['course_id'],
					 'subject' => $data['subject']
			 	];
				if (count($course['subject']) > 0) {
					foreach ($course['subject'] as $key => $value) {
						$temp = [
							'course_id' => $course['course_id'],
							'subid' => $value,
							'serial' => $key
						];
						$id = $this->common_model->insert($temp, 'course_meta');
					}
					if ($id) {
						$this->session->set_flashdata(array('error' => 0, 'msg' => 'Course Curriculum Update Done'));
		 			 	redirect(base_url('admin/course/curriculum/').$data['course_id'], 'refresh');
				 } else {
					 	$this->session->set_flashdata(array('error' => 1, 'msg' => 'Course Curriculum Update Failed'));
 	 			 		redirect(base_url('admin/course/curriculum/').$data['course_id'], 'refresh');
				 }
				} else {
					$this->session->set_flashdata(array('error' => 1, 'msg' => 'Choose at least one Subject'));
	 			 redirect(base_url('admin/course/curriculum/').$data['course_id'], 'refresh');
				}
		 }
		}else{
			$this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
 }

}
