<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('article_model');
		$this->load->model('web_model');
		$this->load->model('indexing_model');
		$this->load->model('search_model');
		$this->load->library("pagination");
		$this->load->model('pdf_model');

		
	}

	public function player(){
		$this->load->view('player');
	}

	public function index(){
        $data = array();

				$data['homeSlider'] = 0;

				$slider_value = !empty($this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value : '';

				$data['slider'] = json_decode($slider_value, true);

				$data['category'] = $this->common_model->home_category();

				$data['trending'] = $this->common_model->home_trending();
				$data['test'] = $this->common_model->select('tests');
				$data['article'] = $this->common_model->select('article');
				$data['main_content'] = $this->load->view('home', $data, true);

				$this->load->view('index', $data);
  	}


		public function category($category = '') {

			$param = $this->security->xss_clean($this->uri->segment(2));

			$data['pageparam'] = [
				'param' => $param,
				'page' => 0,
				];
			$data['param'] = $param;
			$data['category'] = $this->common_model->home_category();


			$data['main_content'] = $this->load->view('categorys', $data, true);

			$this->load->view('index', $data);
		}

		public function cpage($category = '', $page = 0) {

			$param = $this->security->xss_clean($this->uri->segment(2));

			$data['pageparam'] = [
				'param' => $param,
				'page' => $page,
				];
			$data['param'] = $param;
			$data['category'] = $this->common_model->home_category();


			$data['main_content'] = $this->load->view('categorys', $data, true);

			$this->load->view('index', $data);
		}

		public function get_categorys($param, $page) {

			 $output = array();
			  // Set pagination
			 $id = $this->web_model->catIdByName($param);

			 $data['root'] = array_flatten( $this->indexing_model->get_root($id, 'category') );


			 if ($data['root'] > 0) {
			 		 // code...
			 	$config = array();
			 	$config['per_page'] = 4;
			 	$page = ($config['per_page'] * $page);


			 	$result = $this->search_model->search_list(array_slice($data['root'], $page, $config['per_page']));

			 	foreach ($result as $value) {
			 		 $output['datas'][] = [
			 		 	'id' => $value->id,
			 		 	'name' => ucfirst($value->name),
			 		 	'slug' => $value->slug,
			 		 	'isthat' => $value->isthat,
			 		 	'created' => time_diff($value->created),
			 		 	'thumb' => $this->common_model->getThumByRoot($value->id),
			 		 	'tags' => $this->common_model->getIndexTags($value->id),
			 		 	'category' => $this->common_model->getIndexCategorys($value->id)
			 		 ];
			 	}

			 	$config["base_url"] = base_url() . "cpage/".$param;
			 	$config["total_rows"] = count($data['root']);

			 	 // custom paging configuration
			 			 $config['num_links'] = 2;
			 			 $config['use_page_numbers'] = TRUE;
			 			 $config['reuse_query_string'] = TRUE;

			 			  $config['full_tag_open'] = '<ul class="uk-pagination my-5 uk-flex-center" uk-margin>';
			 			  $config['full_tag_close'] = '</ul>';

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

    public function payment() {
        $data = array();
				$data['breadcrumbs'] = [array('url' => base_url('payment'), 'name' => 'Payment Page')];
				$data['main_content'] = $this->load->view('payment', $data, true);
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
	public function pdf()
	{
		$data = array();
		$data['page'] = 'PDF';
		$data['pdf'] =  $this->common_model->select_list();
		//echo "<pre>";print_r($data['pdf']);exit;
		$data['main_content'] = $this->load->view('pdf', $data, true);
		$this->load->view('index', $data);
	}
	public function counselling()
	{
		$data = array();
		$data['page'] = 'faq';
		$data['main_content'] = $this->load->view('counselling', $data, true);
		$this->load->view('index', $data);
	}
	public function feedback()
	{
		$data = array();
		$data['page'] = 'faq';
		$data['main_content'] = $this->load->view('feedback', $data, true);
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
