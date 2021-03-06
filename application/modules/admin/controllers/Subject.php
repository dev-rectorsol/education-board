<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('Common_model');
			$this->load->model('subject_model');
	}
	public function index()
	{
		$data= array();
		$data['page'] ='Subject';
		$data['main_content']= $this->load->view('subject/addSubject',$data, true);
		$this->load->view('index',$data);
	}

	public function get_subject(){
		if ($_POST) {
			$subject=$this->security->xss_clean($_POST);
			$data = $this->subject_model->get_sujcect_by_name($subject['search']);
			echo json_encode($data);
		}
	}
	public function View()
	{
		$data= array();
		$data['page'] ='Subject';
		$data['subject']=  $this->subject_model->select();
		$data['main_content']= $this->load->view('subject/view',$data, true);
		$this->load->view('index',$data);
	}
	public function addLesson($id)
	{
		$data= array();
		$data['page'] ='Add Lesson';
		$data['subject']=  $this->subject_model->select_by_id($id);
		$data['sub']=  $this->subject_model->select_Lesson_by_id($id);
		$data['lesson']=  $this->subject_model->select_Lesson();

		$data['main_content']= $this->load->view('subject/addLesson',$data, true);
		$this->load->view('index',$data);
	}
	public function LessonAdd($id)
	{
		if($_POST){
			 $data1=$this->security->xss_clean($_POST);
			$count= $this->subject_model->getMaxSerial($id);

			if($count == NULL){
				$count=0;
			}
		foreach($data1['lesson'] as $row){
			 $course=[
			   		'subject_id' =>$id,
            'Lesson_id' => $row,
            'serial' => ++$count
		];
		 $this->Common_model->insert($course,'subject_meta');
		}
		redirect(base_url() . 'admin/subject/view', 'refresh');
			}
	}
	 public function add()
	{
		if($_POST){
			 $data = $_POST;
			 $id = $this->Common_model->get_last_id('subject');
			 if ($data['submit'] == 'publish') {
				 $subject = [
					 		'subject_id' => getCustomId($id, 'sub'),
              'name' => $data['name'],
             	'description' => $data['description'],
             	'is_publish' => 1,
							'created_at' => current_datetime()
         ];
			}else{
				$subject = [
						 'subject_id' => getCustomId($id, 'sub'),
						 'name' => $data['name'],
						 'description' => $data['description'],
						 'is_publish' => 0,
						 'created_at' => current_datetime()
				];
			}
			if ($this->Common_model->insert($subject,'subject')) {
				$this->session->set_flashdata(array('error' => 0, 'msg' => 'Subject Create Done'));
				redirect(base_url('admin/subject/edit/').$subject['subject_id'], 'refresh');
		 }  else {
			 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Subject Creation Failed'));
			 redirect($_SERVER['HTTP_REFERER'], 'refresh');
		 }
	 } else {
		 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
		 redirect($_SERVER['HTTP_REFERER'], 'refresh');
	 }
  }


	public function edit($id=''){
		if ($id != '') {
			$data= array();
			$data['page'] ='Edit Subject';
			$data['data']=  $this->subject_model->select_by_id($id);
			$data['main_content']= $this->load->view('subject/edit-view',$data, true);
			$this->load->view('index',$data);
		}else {
			$this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
 		 	redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}

	}


  public function update()
	{
		if($_POST){
			 $data = $_POST;
			 if ($data['submit'] == 'update') {
				 $subject = [
 					'name' => $data['name'],
 					'description' => $data['description'],
 				];
			 }else if ($data['submit']) {
			 	$subject = [
					'name' => $data['name'],
					'description' => $data['description'],
					'is_publish' => 1
				];
			 } else {
				$subject = [
						 'name' => $data['name'],
						 'description' => $data['description'],
						 'is_publish' => 0
				];
			}
			if ( $this->Common_model->update($subject,'subject_id',$data['subject_id'],'subject') ) {
				$this->session->set_flashdata(array('error' => 0, 'msg' => 'Subject Updated Done'));
				redirect(base_url('admin/subject/edit/').$data['subject_id'], 'refresh');
			 }  else {
				 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Action Failed'));
				 redirect($_SERVER['HTTP_REFERER'], 'refresh');
			 }
		 } else {
			 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
			 redirect($_SERVER['HTTP_REFERER'], 'refresh');
		 }
  }


     public function delete($id)
		 {
        $data1=['subject_id'=> $id];
        $this->Common_model->delete($data1,'subject');
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }


		// Subject curriculum

		public function curriculum($id){
			$data = array();
			$data['page'] = 'Edit Subject';
			$data['subject'] = $this->subject_model->select_by_id($id);
			$data['curriculum'] = $this->subject_model->select_subject_curriculum_by_id($id);
			$data['main_content'] = $this->load->view('subject/add-curriculum', $data, true);
			$data['script'] = $this->load->view('layout/__curriculum_sub.php', $data, true);
			$this->load->view('index',$data);
		}

		public function add_curriculum() {
			if($_POST){
				$data=$this->security->xss_clean($_POST);
				// Check Data Is Already apc_exists
				$this->subject_model->check_curriculum($data['subject_id']);

				if ($data['submit'] == 'publish') {
					$course = [
						 'subject_id' => $data['subject_id'],
						 'subject' => $data['subject']
					];
					if (count($course['subject']) > 0) {
						foreach ($course['subject'] as $key => $value) {
							$temp = [
								'subject_id' => $course['subject_id'],
								'lesson_id' => $value,
								'serial' => $key
							];
							$id = $this->common_model->insert($temp, 'subject_meta');
						}
						if ($id) {
							$this->session->set_flashdata(array('error' => 0, 'msg' => 'Subject Curriculum Update Done'));
							redirect(base_url('admin/subject/curriculum/').$data['subject_id'], 'refresh');
					 } else {
							$this->session->set_flashdata(array('error' => 1, 'msg' => 'Subject Curriculum Update Failed'));
							redirect(base_url('admin/subject/curriculum/').$data['subject_id'], 'refresh');
					 }
					} else {
						$this->session->set_flashdata(array('error' => 1, 'msg' => 'Choose at least one Subject'));
					 redirect(base_url('admin/subject/curriculum/').$data['subject_id'], 'refresh');
					}
			 }
			}else{
				$this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
	 }
}
