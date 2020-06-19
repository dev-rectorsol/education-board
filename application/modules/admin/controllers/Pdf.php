<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('common_model');
			$this->load->model('lesson_model');
			$this->load->model('pdf_model');
	}
	public function index()
	{
		$data= array();
		$data['page'] ='Add PDF';
		$data['main_content']= $this->load->view('pdf/add-view',$data, true);
		$data['script']= $this->load->view('pdf/script',$data, true);
		$this->load->view('index',$data);
	}

	public function view()
	{
		$data= array();
		$data['page'] ='Lesson';
		$data['pdf']=  $this->pdf_model->select_list();
		$data['main_content']= $this->load->view('pdf/list-view',$data, true);
		$this->load->view('index',$data);
	}

		public function add() {
		 	if($_POST){
		 		 $data = $_POST;
		 		 $id = $this->common_model->get_last_id('lesson');
		 		 if ($data['submit'] == 'publish') {
		 			 $lesson = [
		 						'lesson_id' => getCustomId($id, 'lect'),
		 						'name' => $data['name'],
								'slug' => $data['slug'],
		 						'description' => $data['description'],
		 						'is_publish' => 1,
								'lesson_type' => 'pdf',
		 						'created_at' => current_datetime()
		 			 ];
		 		}else{
		 			$lesson = [
		 					 'lesson_id' => getCustomId($id, 'lect'),
		 					 'name' => $data['name'],
							 'slug' => $data['slug'],
							 'lesson_type' => 'pdf',
		 					 'description' => $data['description'],
		 					 'created_at' => current_datetime()
		 			];
		 		}
		 		if ($this->common_model->insert($lesson, 'lesson')) {

					if ( isset($_POST['pdf']) ) {
						// if added feature image
						$this->common_model->addPdf($_POST['pdf'], $lesson['lesson_id']);
					}

		 			$this->session->set_flashdata(array('error' => 0, 'msg' => 'Pdf Lesson Create Done'));
		 			redirect(base_url('admin/pdf/edit/').$lesson['lesson_id'], 'refresh');
		 	 }  else {
		 		 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Pdf Lesson Creation Failed'));
		 		 redirect($_SERVER['HTTP_REFERER'], 'refresh');
		 	 }
		  } else {
		 	 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
		 	 redirect($_SERVER['HTTP_REFERER'], 'refresh');
		  }
	 	}

		public function edit($id){
			if ($id != '') {
				$data= array();
				$data['page'] ='Edit Lesson';
				$data['pdf']=  $this->pdf_model->get_documents($id);
				$data['data']=  $this->lesson_model->select_by_id($id);
				$data['main_content']= $this->load->view('pdf/edit-view',$data, true);
				$data['script']= $this->load->view('pdf/script',$data, true);
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
						 $lesson = [
		 					'name' => $data['name'],
							'slug' => $data['slug'],
		 					'description' => $data['description'],
		 				];
					 }else if ($data['submit']) {
					 	$lesson = [
							'name' => $data['name'],
							'slug' => $data['slug'],
							'description' => $data['description'],
							'is_publish' => 1
						];
					 } else {
						$lesson = [
								 'name' => $data['name'],
								 'slug' => $data['slug'],
								 'description' => $data['description'],
								 'is_publish' => 0
						];
					}
					if ( $this->common_model->update($lesson, 'lesson_id', $data['lesson_id'], 'lesson') ) {

						if ( isset($_POST['pdf']) ) {
							// if added feature image
							$this->common_model->addPdf($_POST['pdf'], $data['lesson_id']);
						}

			 			$this->session->set_flashdata(array('error' => 0, 'msg' => 'PDF Lesson Update Done'));
			 			redirect(base_url('admin/pdf/edit/').$data['lesson_id'], 'refresh');
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
	        $data1=['lesson_id'=> $id];
	        $this->common_model->delete($data1,'lesson');
	        redirect($_SERVER['HTTP_REFERER'], 'refresh');
	    }


		function pdfRemove($id){
			$data1 = [ 'docid'=> $id ];
			$this->common_model->delete($data1,'docfile');
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}

		public function get_documents(){
			if ($_POST) {
				$subject=$this->security->xss_clean($_POST);
				$data = $this->pdf_model->get_documents_by_name($subject['search']);
				echo json_encode($data);
			}
		}
}
