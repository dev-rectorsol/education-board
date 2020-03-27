<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index(){
        $data = array();
        $data['page'] = 'Education Board';
        $data['main_content'] = $this->load->view('home', $data, true);
        $this->load->view('index', $data);
    }

    public function about(){
        $data = array();
        $data['page'] = 'About Us';
        $data['main_content'] = $this->load->view('about', $data, true);
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

    public function contact(){
        $data = array();
        $data['page'] = 'contact';
        $data['main_content'] = $this->load->view('contact', $data, true);
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