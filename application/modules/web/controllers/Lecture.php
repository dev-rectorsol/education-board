<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecture extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common_model');
		$this->load->model('lesson_model');
	}

	public function index($node) {
		$output = array();
		$data = $this->lesson_model->get_lecture($node);
		foreach ($data as $value) {
			$output = (object)[
				'view_id' => $value['videoid'],
				'name' => $value['name'],
				'videotype' => $value['videotype'],
				'url' => base_url($value['url']),
				'size' => convertToReadableSize($value['size']),
				'download' => $value['download']
			];
		}
		$data['poster'] = $this->common_model->getThumByRoot($node);
		$data['player'] = $output;
		$this->load->view('layout/embedded-player', $data);
	}

}

?>
