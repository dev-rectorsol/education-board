<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classroom extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('common_model');
			$this->load->model('course_model');
			$this->load->model('classroom_model');
	}
	public function index()
	{
		$data= array();
		$data['page'] ='Add Course';
		$data['classroom'] = $this->classroom_model->select_all();
		$data['main_content']= $this->load->view('classroom/list-view',$data, true);
		$data['script']= $this->load->view('classroom/script',$data, true);
		$this->load->view('index',$data);
	}
	public function new() {
		$data= array();
		$data['page'] = 'Add Class Room';
		$data['main_content'] = $this->load->view('classroom/add-view',$data, true);
		$data['script'] = $this->load->view('classroom/script',$data, true);
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
			 $data1=$_POST;
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
	 public function add() {
		if($_POST){
			$flage = 0;
			 $data=$_POST;
			 if (is_array($data['users'])) {
				 foreach ($data['users'] as $value) {
				 	// code...
					$course = [
						'course_id' => $data['course_id'],
						'user_id' => $value,
					];
					if(!$this->classroom_model->check($course)){
						$flage = $this->common_model->insert($course,'users_course');
					}
				}
				if ($flage) {
					$this->session->set_flashdata(array('error' => 0, 'msg' => 'Class Room Create Done'));
					redirect(base_url('admin/classroom'), 'refresh');
				}  else {
					$this->session->set_flashdata(array('error' => 1, 'msg' => 'Class Room Creation Failed'));
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
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
	public function delete($id)
	{
      $data1=['course_id'=> $id];
      $this->common_model->delete($data1,'course');
			$this->session->set_flashdata(array('error' => 0, 'msg' => 'Data Deleted'));
      redirect($_SERVER['HTTP_REFERER'], 'refresh');
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
