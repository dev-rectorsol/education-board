<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('common_model');
			$this->load->model('lesson_model');
	}
	public function index()
	{
		$data= array();
		$data['page'] ='Add Lesson';
		$data['tag']=  $this->common_model->select('tags');
		$data['category']=  $this->common_model->select('category');
		$data['main_content']= $this->load->view('lesson/add',$data, true);
		$this->load->view('index',$data);
	}

	public function trending()
	{
		$data= array();
		$data['page'] ='Add Trending';
		$data['tag']=  $this->common_model->select('tags');
		$data['category']=  $this->common_model->select('category');
		$data['main_content']= $this->load->view('lesson/add-trending',$data, true);
		$this->load->view('index',$data);
	}

	public function View()
	{
		$data= array();
		$data['page'] ='Lesson';
		$data['lesson']=  $this->lesson_model->select_list();
		$data['main_content']= $this->load->view('lesson/view',$data, true);
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

		public function add() {
		 	if($_POST){
		 		 $data = $_POST;
		 		 $id = $this->common_model->get_last_id('lesson');
		 		 if ($data['submit'] == 'publish') {
		 			 $lesson = [
		 						'lesson_id' => getCustomId($id, 'lect'),
		 						'name' => $data['name'],
		 						'description' => $data['description'],
		 						'is_publish' => 1,
		 						'created_at' => current_datetime()
		 			 ];
		 		}else{
		 			$lesson = [
		 					 'lesson_id' => getCustomId($id, 'sub'),
		 					 'name' => $data['name'],
		 					 'description' => $data['description'],
		 					 'created_at' => current_datetime()
		 			];
		 		}
		 		if ($this->common_model->insert($lesson, 'lesson')) {

					$this->common_model->indexing($_POST, $lesson['lesson_id']);

					if ( isset($_POST['featureImage']) ) {
						// if added feature image
						$this->common_model->addThumb($_POST['featureImage'], $lesson['lesson_id']);
					}

					if ( isset($data['lactureVideo']) ) {
						// if Added video lacture
						$this->common_model->addLacture($data['lactureVideo'], $lesson['lesson_id']);
					}
		 			$this->session->set_flashdata(array('error' => 0, 'msg' => 'Lesson Create Done'));
		 			redirect(base_url('admin/lesson/edit/').$lesson['lesson_id'], 'refresh');
		 	 }  else {
		 		 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Lesson Creation Failed'));
		 		 redirect($_SERVER['HTTP_REFERER'], 'refresh');
		 	 }
		  } else {
		 	 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
		 	 redirect($_SERVER['HTTP_REFERER'], 'refresh');
		  }
	 	}

		public function add_trending() {
		 	if($_POST){
		 		 $data = $_POST;
		 		 $id = $this->common_model->get_last_id('lesson');
		 		 if ($data['submit'] == 'publish') {
		 			 $lesson = [
		 						'lesson_id' => getCustomId($id, 'lect'),
		 						'name' => $data['name'],
		 						'slug' => $data['slug'],
		 						'url' => $data['url'],
		 						'description' => $data['description'],
		 						'is_publish' => 1,
		 						'created_at' => current_datetime()
		 			 ];
		 		}else{
		 			$lesson = [
		 					 'lesson_id' => getCustomId($id, 'sub'),
		 					 'name' => $data['name'],
							 'slug' => $data['slug'],
							 'url' => $data['url'],
		 					 'description' => $data['description'],
		 					 'created_at' => current_datetime()
		 			];
		 		}
		 		if ($this->common_model->insert($lesson, 'lesson')) {

					$this->common_model->indexing($_POST, $lesson['lesson_id']);

					if ( isset($_POST['featureImage']) ) {
						// if added feature image
						$this->common_model->addThumb($_POST['featureImage'], $lesson['lesson_id']);
					}

					if ( isset($data['lactureVideo']) ) {
						// if Added video lacture
						$this->common_model->addLacture($data['lactureVideo'], $lesson['lesson_id']);
					}
		 			$this->session->set_flashdata(array('error' => 0, 'msg' => 'rending Video Create Done'));
		 			redirect(base_url('admin/lesson/edit_trending/').$lesson['lesson_id'], 'refresh');
		 	 }  else {
		 		 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Lesson Creation Failed'));
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
				$data['tag']=  $this->common_model->select('tags');
				$data['category']=  $this->common_model->select('category');
				$data['data']=  $this->lesson_model->select_by_id($id);
				$data['video']=  $this->common_model->getVideoByRoot($id);
				$data['image'] = $this->common_model->getThumByRoot($id);
				$data['indexcategory'] = $this->common_model->getIndexCategorys($id);
				$data['indextags'] = $this->common_model->getIndexTags($id);
				$data['main_content']= $this->load->view('lesson/edit-view',$data, true);
				$this->load->view('index',$data);
			}else {
				$this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
		}

		public function edit_trending($id){
			if ($id != '') {
				$data= array();
				$data['page'] ='Edit Lesson';
				$data['tag']=  $this->common_model->select('tags');
				$data['category']=  $this->common_model->select('category');
				$data['data']=  $this->lesson_model->select_by_id($id);
				$data['video']=  $this->common_model->getVideoByRoot($id);
				$data['image'] = $this->common_model->getThumByRoot($id);
				$data['indexcategory'] = $this->common_model->getIndexCategorys($id);
				$data['indextags'] = $this->common_model->getIndexTags($id);
				$data['main_content']= $this->load->view('lesson/edit-view-trending',$data, true);
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
		 					'description' => $data['description'],
		 				];
					 }else if ($data['submit']) {
					 	$lesson = [
							'name' => $data['name'],
							'description' => $data['description'],
							'is_publish' => 1
						];
					 } else {
						$lesson = [
								 'name' => $data['name'],
								 'description' => $data['description'],
								 'is_publish' => 0
						];
					}
					if ( $this->common_model->update($lesson, 'lesson_id', $data['lesson_id'], 'lesson') ) {

						$this->common_model->indexing($_POST, $data['lesson_id']);

						if ( isset($_POST['featureImage']) ) {
							// if added feature image
							$this->common_model->addThumb($_POST['featureImage'], $data['lesson_id']);
						}
						if ( isset($data['lactureVideo']) ) {
								// if Added + new video lacture
							$this->common_model->addLacture($data['lactureVideo'], $data['lesson_id']);
						}
			 			$this->session->set_flashdata(array('error' => 0, 'msg' => 'Lesson Update Done'));
			 			redirect(base_url('admin/lesson/edit/').$data['lesson_id'], 'refresh');
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
							$this->common_model->addThumb($_POST['featureImage'], $data['lesson_id']);
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


		function lactureRemove($id){
			$data1 = [ 'videoid'=> $id ];
			$this->common_model->delete($data1,'videos');
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}

		public function get_lesson(){
			if ($_POST) {
				$subject=$this->security->xss_clean($_POST);
				$data = $this->lesson_model->get_lesson_by_name($subject['search']);
				echo json_encode($data);
			}
		}
}
