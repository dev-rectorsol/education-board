<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('common_model');
		$this->load->model('course_model');
		$this->load->model('test_model');
		$this->load->model('subject_model');
		$this->load->library("pagination");

	}

	function index($level = 'all', $page = 1) {
		$data = array();
		$page = !empty($page) ? $page : 1;
		$data['breadcrumbs'] = [array('url' => base_url('test'), 'name' => 'Test Series')];
		$data['levels'] = $this->common_model->select('levels');
		$param = $this->security->xss_clean($this->uri->segment(2));
		$data['param'] = $param;
		$data['page'] = $page;
		$data['level'] = $level;
		$data['url'] = base_url("test/get_list/".$level."/".$page);
		$data['main_content'] = $this->load->view('test/test-list', $data, true);
		$this->load->view('index', $data);
	}

	public function get_list($level = 'all', $page = 0) {
		$output = array();
		$total_rows = $this->test_model->get_count('tests', $level);

			if ($total_rows > 0) {
				$config = array();
				$config['per_page'] = 2;
				$page = ($config['per_page'] * $page) - $config['per_page'];
				// code...
			if ($level == 'all') {

						$data = $this->test_model->select_test_list($config["per_page"], $page);

				} else {

					$data = $this->test_model->select_test_list_level($level, $config["per_page"], $page);

				}
			foreach ($data as $value) {
				$output['products'][] = [
					'testid' => $value['testid'],
					'title' => $value['title'],
					'slug' => $value['slug'],
					'duration' => $value['duration'],
					'level' => ucfirst($value['level']),
					'created' => time_diff($value['created']),
					'image' => $this->common_model->getImageByRoot($value['testid']),
					'tags' => $this->common_model->getIndexTags($value['testid']),
					'category' => $this->common_model->getIndexCategorysName($value['testid'])
				];
			}

			$config["base_url"] = base_url() . "test/" . $level;
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


	public function intro($id){
		$data = array();
		$output = $this->test_model->select_by_id($id);
		if ($output) {
			$data['breadcrumbs'] = [
				array('url' => base_url('test'), 'name' => 'Test Series'),
				array('url' => base_url('intro') . "/" .$id , 'name' => $output->title)
			];

			$data['test'] = $this->test_model->select_test_single($id);
			$data['image'] = $this->common_model->getImageByRoot($id);

			$data['main_content'] = $this->load->view('test/test-intro', $data, true);
			$this->load->view('index', $data);
		} else {
			$this->output->set_content_type('application/json')->set_output(json_encode(array('error' => 1, 'msg' => 'Test details Not Found!')));
		}
	}

	public function test_curriculum($id) {
		$data = array();
		$data = $this->course_model->select_test_curriculum_by_id($id);

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
				];
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	public function comming(){
		$this->load->view('comming-soon');
	}


	// Test Start

	public function start(){
		if(isset($_REQUEST['key']) && isset($_REQUEST['star'])){
			$data = array();
			$test = $this->test_model->select_test_single($_REQUEST['key']);
			if (!empty($test)) {
				// code...
				$data['test'] = $test;
				$curriculum = json_decode($test->curriculum);
				if (!empty($curriculum)) {
					// code...
					$data['curriculum'] = $curriculum;

					$this->load->view('practical/get-start', $data);
				} else {

				}
			}else{

			}
		}else{
			pagenotfound();
		}
	}




}

?>
