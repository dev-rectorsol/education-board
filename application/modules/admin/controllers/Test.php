<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('common_model');
			$this->load->model('test_model');
			$this->load->model('question_model');
	}
	public function index()
	{
		$data= array();
		$data['page'] = 'Test Serise';
		$data['tests']= $this->test_model->select_list();
		$data['main_content']= $this->load->view('test/list-view',$data, true);
		$this->load->view('index',$data);
	}

	public function add()
	{
		$data= array();
		$data['page'] ='Add New Test Serise';
		$data['main_content']= $this->load->view('test/add-view',$data, true);
		$this->load->view('index',$data);
	}

	public function trending_view()
	{
		$data= array();
		$data['page'] ='Lesson';
		$data['lesson']=  $this->common_model->home_trending();
		$data['main_content']= $this->load->view('lesson/trending-view',$data, true);
		$this->load->view('index',$data);
	}

		public function save() {
		 	if($_POST){
		 		 $data = $_POST;
		 		 $id = $this->common_model->get_last_id('tests');
		 		 if ($data['submit'] == 'publish') {
		 			 $test = [
		 						'testid' => getCustomId($id, 'test'),
								'title' => $data['title'],
								'slug' => $data['slug'],
 							 	'duration' => $data['duration'],
		 						'description' => $data['description'],
								'curriculum' => json_encode(array()),
		 						'is_publish' => 1,
		 						'created' => current_datetime()
		 			 ];
		 		}else{
		 			$test = [
						'testid' => getCustomId($id, 'test'),
						'title' => $data['title'],
						'slug' => $data['slug'],
						'duration' => $data['duration'],
						'curriculum' => json_encode(array()),
						'description' => $data['description'],
						'created' => current_datetime()
		 			];
		 		}
		 		if ($this->common_model->insert($test, 'tests')) {

					if ( isset($_POST['featureImage']) ) {
						// if added feature image
						$this->common_model->addThumb($_POST['featureImage'], $test['testid']);
					}

					$this->session->set_flashdata(array('error' => 0, 'msg' => 'Test Serise Create Done'));
		 			redirect(base_url('admin/test/edit/').$test['testid'], 'refresh');
		 	 }  else {
		 		 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Test Serise Creation Failed'));
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
				$data['page'] ='Edit Test Serise';
				$data['data']=  $this->test_model->select_by_id($id);
				$data['image'] = $this->common_model->getThumByRoot($id);
				$data['main_content']= $this->load->view('test/edit-view',$data, true);
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
						 $test = [
								'title' => $data['title'],
								'slug' => $data['slug'],
 							 	'duration' => $data['duration'],
		 						'description' => $data['description'],
		 						'is_publish' => 1,
		 						'created' => current_datetime()
			 			 ];
					 }else if ($data['submit']) {
						 $test = [
  								'title' => $data['title'],
  								'slug' => $data['slug'],
   							 	'duration' => $data['duration'],
  		 						'description' => $data['description'],
  		 						'is_publish' => 1,
  		 			 ];
					 } else {
						$test = [
								'title' => $data['title'],
								'slug' => $data['slug'],
								'duration' => $data['duration'],
								'description' => $data['description'],
								'is_publish' => 0
						];
					}
					if ( $this->common_model->update($test, 'testid', $data['testid'], 'tests') ) {

						if ( isset($_POST['featureImage']) ) {
							// if added feature image
							$this->common_model->updateThumb($_POST['featureImage'], $data['testid']);
						}

						$this->session->set_flashdata(array('error' => 0, 'msg' => 'Test Serise Update Done'));
			 			redirect(base_url('admin/test/edit/').$data['testid'], 'refresh');
					 }  else {
						 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Action Failed'));
						 redirect($_SERVER['HTTP_REFERER'], 'refresh');
					 }
				 } else {
					 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
					 redirect($_SERVER['HTTP_REFERER'], 'refresh');
				 }
    	}

     public function update_trending() {
				if($_POST){
					 $data = $_POST;
					 if ($data['submit'] == 'update') {
						 $lesson = [
		 					'name' => $data['name'],
							'slug' => $data['slug'],
							'url' => $data['url'],
		 					'description' => $data['description'],
		 				];
					 }else if ($data['submit']) {
					 	$lesson = [
							'name' => $data['name'],
							'slug' => $data['slug'],
							'url' => $data['url'],
							'description' => $data['description'],
							'is_publish' => 1
						];
					 } else {
						$lesson = [
								 'name' => $data['name'],
								 'slug' => $data['slug'],
								 'url' => $data['url'],
								 'description' => $data['description'],
								 'is_publish' => 0
						];
					}
					if ( $this->common_model->update($lesson, 'lesson_id', $data['lesson_id'], 'lesson') ) {

						$this->common_model->indexing($_POST, $data['lesson_id']);

						if ( isset($_POST['featureImage']) ) {
							// if added feature image
							$this->common_model->updateThumb($_POST['featureImage'], $data['lesson_id']);
						}
						if ( isset($data['lactureVideo']) ) {
								// if Added + new video lacture
							$this->common_model->addLacture($data['lactureVideo'], $data['lesson_id']);
						}
			 			$this->session->set_flashdata(array('error' => 0, 'msg' => 'Trending Video Update Done'));
			 			redirect(base_url('admin/lesson/edit_trending/').$data['lesson_id'], 'refresh');
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


			public function qusnbank($id) {
				$data = array();
				$data['page'] = 'Edit Question Bank';
				$data['test'] = $this->test_model->select_by_id($id);
				$data['qusnbank'] = $this->test_model->select_by_id($id);
				$data['image'] = $this->common_model->getThumByRoot($id);
				$data['main_content'] = $this->load->view('test/add-qusnbank',$data, true);
				$data['script'] = $this->load->view('test/script', $data, true);
				$this->load->view('index',$data);
			}

			public function add_qusnbank(){
				if ($_POST) {
					$data = $_POST;
					$question = array();
					$totalmark = 0;
					$numberofq = 0;
					if (isset($data['questions'])) {
						// code...
						foreach ($data['questions'] as $key => $value) {
							$qusdata = $this->question_model->select_qus_info($value);
							$totalmark += $qusdata->values;
							$numberofq = (int)($key + 1);
							$question[] = $qusdata;
						}
					}
					$insert = [
						'curriculum' => json_encode($question),
						'nofqus' => $numberofq,
						'totalno' => $totalmark,
					];
					if ( $this->common_model->update($insert, 'testid', $data['testid'], 'tests') ) {



						$this->session->set_flashdata(array('error' => 0, 'msg' => 'Question Serise Saved'));
				 			redirect(base_url('admin/test/qusnbank/').$data['testid'], 'refresh');

					 }  else {
						 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Action Failed'));
						 redirect($_SERVER['HTTP_REFERER'], 'refresh');
					 }
				}
			}
}
