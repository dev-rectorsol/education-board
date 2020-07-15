<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('common_model');
		$this->load->model('course_model');
		$this->load->model('subject_model');
		$this->load->library("pagination");
		$this->load->helper('download');
	}

  function index($level = 'all', $page = 1) {
		$data = array();
		$page = !empty($page) ? $page : 1;
		$data['breadcrumbs'] = [array('url' => base_url('courses'), 'name' => 'Courses')];
		$data['levels'] = $this->common_model->select('levels');
		$param = $this->security->xss_clean($this->uri->segment(2));
		$data['param'] = $param;
		$data['page'] = $page;
		$data['level'] = $level;
		$data['url'] = base_url("courses/get_list/".$level."/".$page);
		$data['main_content'] = $this->load->view('courses/courses-list', $data, true);
		$this->load->view('index', $data);
  }

	public function get_list($level = 'all', $page = 0) {
		$output = array();
		$total_rows = $this->course_model->get_count('course', $level);

			if ($total_rows > 0) {
				$config = array();
				$config['per_page'] = 10;
				$page = ($config['per_page'] * $page) - $config['per_page'];
				// code...
			if ($level == 'all') {

						$data = $this->course_model->select_course_list($config["per_page"], $page);

				}else{
					$data = $this->course_model->select_course_list_level($level, $config["per_page"], $page);
				}
			foreach ($data as $value) {
				$output['products'][] = [
					'course_id' => $value['course_id'],
					'name' => $value['name'],
					'slug' => $value['slug'],
					'review' => $value['review'],
					'course_type' => ucfirst($value['course_type']),
					'created_by' => $this->common_model->get_username($value['created_by']),
					'created' => time_diff($value['created']),
					'image' => base_url($value['image']),
					'tags' => $this->common_model->getIndexTags($value['course_id']),
					'category' => $this->common_model->getIndexCategorysName($value['course_id'])
				];
			}

			$config["base_url"] = base_url() . "courses/" . $level;
			$config["total_rows"] = $total_rows;

			// custom paging configuration
					 $config['num_links'] = 2;
					 $config['use_page_numbers'] = TRUE;
					 $config['reuse_query_string'] = TRUE;

					 // $config['full_tag_open'] = '<ul class="uk-pagination my-5 uk-flex-center" uk-margin>';
					 // $config['full_tag_close'] = '</ul>';

					 $config['first_link'] = 'First';
					 $config['first_tag_open'] = '<li><span>';
					 $config['first_tag_close'] = '</span></li>';

					 $config['last_link'] = 'Last';
					 $config['last_tag_open'] = '<li><span>';
					 $config['last_tag_close'] = '</span></li>';

					 $config['next_link'] = 'Next';
					 $config['next_tag_open'] = '<li><span>';
					 $config['next_tag_close'] = '</span></li>';

					 $config['prev_link'] = 'Prev';
					 $config['prev_tag_open'] = '<li><span>';
					 $config['prev_tag_close'] = '</span></li>';

					 $config['cur_tag_open'] = '<li class="uk-active"><span>';
					 $config['cur_tag_close'] = '</span></li>';

					 $config['num_tag_open'] = '<li>';
					 $config['num_tag_close'] = '</li>';

					 $this->pagination->initialize($config);


					 $output["links"] = $this->pagination->create_links();


					 $this->output->set_content_type('application/json')->set_output(json_encode($output));
		}

	}

	public function get_single($id) {
			$output = array();
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function intro($id){
		$data = array();
		$output = $this->course_model->select_by_id($id);
		if ($output) {
			$data['breadcrumbs'] = [
				array('url' => base_url('courses'), 'name' => 'Courses'),
				array('url' => base_url('intro') . "/" .$id , 'name' => $output->name)
			];

			$data['course'] = $this->course_model->select_course_single($id);

			$data['main_content'] = $this->load->view('courses/course-intro', $data, true);
			$this->load->view('index', $data);
		} else {
			$this->output->set_content_type('application/json')->set_output(json_encode(array('error' => 1, 'msg' => 'Course details Not Found!')));
		}
	}

	public function resume($id){
		$data = array();
		$output = $this->course_model->select_by_id($id);
		if ($output) {
			$data['breadcrumbs'] = [
				array('url' => base_url('courses'), 'name' => 'Courses'),
				array('url' => base_url('resume') . "/" .$id , 'name' => $output->name)
			];
			$data['course'] = $this->course_model->select_course_single($id);
			$data['thumb'] = $this->common_model->getThumByRoot($id);
			$data['main_content'] = $this->load->view('courses/resume-course-list', $data, true);
			$this->load->view('index', $data);
		} else {
			$this->output->set_content_type('application/json')->set_output(json_encode(array('error' => 1, 'msg' => 'Course details Not Found!')));
		}
	}

	public function demo($id){
		$data = array();
		$output = $this->course_model->select_by_id($id);
		if ($output) {
			$data['breadcrumbs'] = [
				array('url' => base_url('courses'), 'name' => 'Courses'),
				array('url' => base_url('resume') . "/" .$id , 'name' => $output->name)
			];
			$data['course'] = $this->course_model->select_course_single($id);
			$this->load->view('lacture/lacture-play-page', $data);
		} else {
			$this->output->set_content_type('application/json')->set_output(json_encode(array('error' => 1, 'msg' => 'Course details Not Found!')));
		}
	}

	public function check(){
		$str1 = "Hello123";
		echo preg_replace("/[^A-Z]+/", "", $str1);
// $str2 = "Hell";
// echo strcmp($str1, $str2);
	}
		public function download($id){

		$doc = $this->course_model->get_doc_by_id($id);
	
		$details= json_decode($doc[0]['details']);
	
			$link= $details->dirname.'/'. $details->basename;
		// print_r(base_url($link));
		// exit;
		$data = file_get_contents($link); // Read the file's contents
		$name = $details->basename;

		force_download($name, $data);
			}

	public function course_curriculum($id){
		$data = array();
		$data = $this->course_model->select_course_curriculum_by_id($id);

		foreach ($data as $key => $value) {
			$output[$key] = [
				'course_id' => $value['course_id'],
				'subject_name' => $value['name'],
				'subid' => $value['subid'],
				'serial' => $value['serial'],
			];
			if ($value['subid']) {
				// code...
			}
			$subject = $this->subject_model->select_subject_curriculum_by_id($value['subid']);
			foreach ($subject as $temp => $var) {
				$output[$key]['subject_curriculum'][] = [
					'lesson_id' => $var['lesson_id'],
					'lesson_name' => $var['name'],
					'lesson_type' => $var['lesson_type'],
				];
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
}

?>
