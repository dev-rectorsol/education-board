<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common_model');
		$this->load->model('course_model');
		$this->load->model('subject_model');
		$this->load->model('product_model');
	}

	public function index(){}


	public function get_product($id) {
		$data = array();
		$data = $this->product_model->select_product_by_course_id($id);

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
