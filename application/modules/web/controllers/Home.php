<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('article_model');
	}

	public function player(){
		$this->load->view('player');
	}

	public function index(){
        $data = array();

				$data['homeSlider'] = 1;

				$slider_value = !empty($this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value : '';

				$data['slider'] = json_decode($slider_value, true);

				$data['category'] = $this->common_model->home_category();

				$data['trending'] = $this->common_model->home_trending();

				$data['main_content'] = $this->load->view('home', $data, true);

				$this->load->view('index', $data);
    }

		public function get_home_trending(){
			$output = array();
			$data = $this->common_model->home_trending();
			foreach ($data as $value) {
				$output[] = [
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
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}

		public function paths(){
			$data = array();
			$data['breadcrumbs'] = [array('url' => base_url('paths'), 'name' => 'Paths')];
			$data['main_content'] = $this->load->view('course-path', $data, true);
			$this->load->view('index', $data);
		}


		public function blogs(){
			$data = array();
			$data['breadcrumbs'] = [array('url' => base_url('blogs'), 'name' => 'Blogs')];
			$data['featured'] = $this->article_model->featured_article();
			$data['main_content'] = $this->load->view('blogs/blogs', $data, true);
			$this->load->view('index', $data);
		}

		public function blog_single_view($id){
			$data = array();
			$blog = $this->article_model->article_single_view($id);
			$data['breadcrumbs'] = [
				array('url' => base_url('blogs'), 'name' => 'Blogs'),
				array('url' => base_url('single') . '/' . $id, 'name' => $blog->title)
			];
			$data['user'] = $this->common_model->get_user_view_by_id($blog->user_id);
			$data['category'] = $this->common_model->get_category_name_by_blogid($blog->postid);
			$data['blog'] = $blog;
			$data['main_content'] = $this->load->view('blogs/blog-single', $data, true);
			$this->load->view('index', $data);
		}

    public function about(){
        $data = array();
				$data['breadcrumbs'] = [array('url' => base_url('about'), 'name' => 'About Us')];
				$data['main_content'] = $this->load->view('about', $data, true);
        $this->load->view('index', $data);
    }

    public function contact() {
        $data = array();
				$data['breadcrumbs'] = [array('url' => base_url('contact'), 'name' => 'Contact Us')];
				$data['main_content'] = $this->load->view('contact', $data, true);
        $this->load->view('index', $data);
    }

    public function privacy(){
        $data = array();
        $data['breadcrumbs'] = [array('url' => base_url('privacy'), 'name' => 'Privacy')];
        $data['main_content'] = $this->load->view('privacy', $data, true);
        $this->load->view('index', $data);
    }

    public function courses(){
        $data = array();
        $data['page'] = 'Courses';
        $data['main_content'] = $this->load->view('courses', $data, true);
        $this->load->view('index', $data);
    }

    public function courseDetails(){
        $data = array();
        $data['page'] = 'course details';
        $data['main_content'] = $this->load->view('courseDetails', $data, true);
        $this->load->view('index', $data);
    }

    public function event(){
        $data = array();
        $data['page'] = 'Event';
        $data['main_content'] = $this->load->view('event', $data, true);
        $this->load->view('index', $data);
    }


    public function faq(){
        $data = array();
        $data['page'] = 'faq';
        $data['main_content'] = $this->load->view('faq', $data, true);
        $this->load->view('index', $data);
    }

}

/* End of file Home.php */
/* Location: ./application/modules/web/controllers/Home.php */ ?>
