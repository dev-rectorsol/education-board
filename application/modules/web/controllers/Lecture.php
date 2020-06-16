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
		$data = array();
		$check = $this->db->get_where('lesson', array('lesson_id' => $node))->row()->url;
		if($check != null || $check != '') {
			$output = $this->db->get_where('lesson', array('lesson_id' => $node))->row()->url;
			$data['source'] = 'iframe';
		}else{
			$data1 = $this->lesson_model->get_lecture($node);
			if ($data1) {
				foreach ($data1 as $value) {
					$output = (object)[
						'view_id' => $value['videoid'],
						'name' => $value['name'],
						'videotype' => $value['videotype'],
						'url' => $value['url'],
						'size' => convertToReadableSize($value['size']),
						'download' => $value['download']
					];
				}
				$data['poster'] = $this->common_model->getThumByRoot($node);
				$data['source'] = 'static';
			}
		}
		$data['player'] = $output;
		$this->load->view('layout/embedded-player', $data);
	}

}

?>
