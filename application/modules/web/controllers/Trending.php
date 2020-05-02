<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trending extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common_model');
		$this->load->model('course_model');
		$this->load->model('subject_model');
		$this->load->model('product_model');
		$this->load->model('lesson_model');
	}

	public function index($type, $id) {
		$data = array();
		if ($type == 'video') {
			$output = $this->db->get_where('lesson', array('lesson_id' => $id))->row();
			if ($output) {
				$data['breadcrumbs'] = [
					array('url' => base_url('trending'), 'name' => 'Trending'),
					array('url' => base_url('video') . "/" .$id , 'name' => $output->name)
				];
				$data['trending'] = $output;
				$data['thumb'] = $this->common_model->getThumByRoot($output->lesson_id);
				$temp = $this->common_model->getVideoByRoot($output->lesson_id);
				foreach ($temp as $value) {
					$data['views'] = (object)[
						'view_id' => $value['videoid'],
						'name' => $value['name'],
						'videotype' => $value['videotype'],
						'url' => base_url($value['url']),
						'size' => convertToReadableSize($value['size']),
					];
				}

				$data['trending'] = $output;
				$data['main_content'] = $this->load->view('trending/video-play', $data, true);
				$this->load->view('index', $data);
			}else {
				$this->output->set_content_type('application/json')->set_output(json_encode(array('error' => 1, 'msg' => 'Videos details Not Found!')));
			}
		}else{

		}
	}

	public function get_related($type, $node){
		$data = array();
		switch ($type) {
		    case "video":
					$output = $this->common_model->home_trending();
					foreach ($output as $value) {
							$data[] = [
								'trending_id' => $value['lesson_id'],
								'name' => ucfirst($value['name']),
								'slug' => ucfirst($value['slug']),
								'url' => !empty($value['url']) ? $value['url'] : base_url("trending/video/").$value['lesson_id'] ,
								'description' => $value['description'],
								'created' => time_diff($value['created_at']),
								'image' => !empty($value['image']) ? base_url($value['image']) : base_url('assets/images/defult_banner.jpg'),
								'category' => $this->common_model->getIndexCategorysName($value['lesson_id']),
							];
					}
					break;
		    case "blog":

							$data = [
								'error' => 1,
								'msg' => 'Type Of Request Not Allows'
							];

		        break;
		    default:

					$data = [
						'error' => 1,
						'msg' => 'Type Of Request Not Allows'
					];

		}

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

}

?>
