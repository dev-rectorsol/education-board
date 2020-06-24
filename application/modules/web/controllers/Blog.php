<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('common_model');
		$this->load->model('course_model');
		$this->load->model('article_model');
		$this->load->model('subject_model');
		$this->load->library("pagination");
	}

  function index($page = 1){
		$data['breadcrumbs'] = [array('url' => base_url('blogs'), 'name' => 'Blogs')];
		$data['featured'] = $this->article_model->featured_article();

		$data['category'] = $this->common_model->home_category();
		$param = $this->security->xss_clean($this->uri->segment(2));
		$data['param'] = $param;
		// pre($data['featured']);exit;
		$data['page'] = $page;
		$data['main_content'] = $this->load->view('blogs/blogs', $data, true);
		$this->load->view('index', $data);
  }

	public function get_list($page = 0) {
		$output = array();
		// Set pagination
		$total_rows = $this->article_model->get_count();
		if ($total_rows > 0) {
				// code...
			$config = array();
			$config['per_page'] = 4;
			$page = ($config['per_page'] * $page) - $config['per_page'];


			$data = $this->article_model->select_blog_list($config["per_page"], $page);
			foreach ($data as $value) {
				$output['blogs'][] = [
					'postid' => $value['postid'],
					'title' => ucfirst($value['title']),
					'slug' => $value['slug'],
					'content' => substr($value['content'], 0, 255),
					'created_by' =>  $value['created_by'],
					'authors_name' => $this->common_model->get_username($value['created_by']),
					'created' => time_diff($value['public_at']),
					'thumb' => base_url($value['thumb']),
					'image' => base_url($value['image']),
					'tags' => $this->common_model->getIndexTags($value['postid']),
					'category' => $this->common_model->getIndexCategorysName($value['postid'])
				];
			}

			$config["base_url"] = base_url() . "blogs";
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

			$data['course'] = $this->course_model->select_course_single($id);;

			$data['main_content'] = $this->load->view('courses/course-intro', $data, true);
			$this->load->view('index', $data);
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
