<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common_model');
		$this->load->model('course_model');
		$this->load->model('subject_model');
	}

  function index(){
		$data = array();
		$data['breadcrumbs'] = [array('url' => base_url('courses'), 'name' => 'Courses')];
		$data['main_content'] = $this->load->view('courses/courses-list', $data, true);
		$this->load->view('index', $data);
  }

	public function get_list(){
		$output = array();
		$data = $this->course_model->select_course_list();
		foreach ($data as $value) {
			$output[] = [
				'course_id' => $value['course_id'],
				'name' => $value['name'],
				'slug' => $value['slug'],
				'review' => $value['review'],
				'course_type' => ucfirst($value['course_type']),
				'created_by' => $this->common_model->get_username($value['created_by']),
				'created' => time_diff($value['created']),
				'image' => base_url($value['image'])
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
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

			$data['course'] = $this->course_model->select_course_single($id);;

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
}

?>
