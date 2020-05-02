<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common_model');
		$this->load->model('course_model');
		$this->load->model('article_model');
		$this->load->model('subject_model');
	}

  function index(){
		$data = array();
		$data['breadcrumbs'] = [array('url' => base_url('blogs'), 'name' => 'Blogs')];
		$data['featured'] = $this->article_model->featured_article();
		$data['main_content'] = $this->load->view('blogs/blogs', $data, true);
		$this->load->view('index', $data);
  }

	public function get_list(){
		$output = array();
		$data = $this->article_model->select_blog_list();
		foreach ($data as $value) {
			$output[] = [
				'postid' => $value['postid'],
				'title' => ucfirst($value['title']),
				'slug' => $value['slug'],
				'content' => substr($value['content'], 0, 255),
				'created_by' =>  $value['created_by'],
				'authors_name' => $this->common_model->get_username($value['created_by']),
				'created' => time_diff($value['public_at']),
				'thumb' => base_url($value['thumb']),
				'image' => base_url($value['image']),
				// 'tags' => $this->common_model->getIndexTags($value['postid']),
				// 'category' => $this->common_model->getIndexCategorys($value['postid'])
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
