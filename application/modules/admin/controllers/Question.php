<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('common_model');
			$this->load->model('question_model');
	}
	public function index()
	{
		$data= array();
		$data['page'] = 'Questions Bank';
		$data['questions']= $this->question_model->select_list();
		$data['main_content']= $this->load->view('question/list-view',$data, true);
		$data['script']= $this->load->view('question/script',$data, true);
		$this->load->view('index',$data);
	}

	public function add()
	{
		$data= array();
		$data['page'] ='Add New Question';
		$data['main_content']= $this->load->view('question/add-view',$data, true);
		$this->load->view('index',$data);
	}

		public function save() {
		 	if($_POST){
		 		 $data = $_POST;
		 		 $id = $this->common_model->get_last_id('questions');
		 		 if ($data['submit'] == 'save') {
		 			 $qus = [
		 						'qusid' => getCustomId($id, 'qus'),
								'name' => $data['name'],
								'title' => $data['title'],
								'type' => $data['type'],
								'values' => $data['values'],
								'answer' => $data['currect'],
		 			 ];
		 		}
		 		if ($this->common_model->insert($qus, 'questions')) {

					if ($_POST['type'] == 'multiple-choice') {
						// if added  multiple-choice options
						self::multiple($_POST['option'], $qus['qusid']);
					}

					$this->session->set_flashdata(array('error' => 0, 'msg' => 'Question Saved'));
		 			redirect(base_url('admin/question/edit/').$qus['qusid'], 'refresh');
		 	 }  else {
		 		 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Question Creation Failed'));
		 		 redirect($_SERVER['HTTP_REFERER'], 'refresh');
		 	 }
		  } else {
		 	 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
		 	 redirect($_SERVER['HTTP_REFERER'], 'refresh');
		  }
	 	}

		public function multiple($options, $qusid){
			if (is_array($options)) {
				foreach ($options as $key => $value) {
					$opt = [
						'qusid' => $qusid,
						'option' => $value,
						'count' => (int)($key+1),
					];
					$this->common_model->insert($opt, 'question_meta');
				}
			}
		}

		public function get_multiplechoice(){
			if ($_POST) {
				$qusid = $_POST['id'];
				$data['currect'] = $this->question_model->get_answer($qusid);
				$data['options'] = $this->question_model->get_options($qusid);
				$data['script']= $this->load->view('question/script',$data, true);
				echo $this->load->view('question/maltiple-choice', $data, true);
			} else {
				echo json_encode(array('error' => 1, 'msg' => 'Request not Allowed'));
			}
		}

		public function edit($id){
			if ($id != '') {
				$data= array();
				$data['page'] ='Edit Question';
				$data['data'] =  $this->question_model->select_by_id($id);
				$data['main_content']= $this->load->view('question/edit-view',$data, true);
				$data['script']= $this->load->view('question/script',$data, true);
				$this->load->view('index',$data);
			}else {
				$this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
		}


     public function update() {
			 if($_POST){
					$data = $_POST;
					if ($data['submit'] == 'update') {
						$qus = [
								 'qusid' => $data['qusid'],
								 'name' => $data['name'],
								 'title' => $data['title'],
								 'type' => $data['type'],
								 'values' => $data['values'],
								 'answer' => $data['currect'],
						];
				 }
				 if ($this->common_model->update($qus, 'qusid', $data['qusid'], 'questions')) {

					 if ($_POST['type'] == 'multiple-choice') {
						 // if added  multiple-choice options
						 $this->common_model->delete(array('qusid' => $qus['qusid']) ,'question_meta');
						 self::multiple($_POST['option'], $qus['qusid']);

					 } else {
						 $this->common_model->delete(array('qusid' => $qus['qusid']) ,'question_meta');
					 }

					 $this->session->set_flashdata(array('error' => 0, 'msg' => 'Question Update Success'));
					 redirect(base_url('admin/question/edit/').$qus['qusid'], 'refresh');
				}  else {
					$this->session->set_flashdata(array('error' => 1, 'msg' => 'Question Update Failed'));
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
			 } else {
				$this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			 }
    }


		 public function delete($id)
			{
            $data1=['lesson_id'=> $id];
            $this->common_model->delete($data1,'lesson');
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
    	}
}
