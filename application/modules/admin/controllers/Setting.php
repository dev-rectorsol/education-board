<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class setting extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			if(check()){
				if(!isAdmin($this->session->userdata('roles')))
					redirect(base_url(), 'refresh');
      }else{
				 	redirect(base_url(), 'refresh');
			}
            $this->load->model('common_model');
            $this->load->model('article_model');
	}
  public function index(){

  }

	public function slider(){
		$data= array();
		$data['page'] ='Slider';
		$data['slider'] = json_decode($this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value, true);
		$data['main_content']= $this->load->view('setting/slider.php',$data, true);
		$this->load->view('index',$data);
	}
	public function addslider(){
		if($_POST){
			$slider=$this->security->xss_clean($_POST);
			$data = [
				'heading' => $slider['heading'],
				'details' => $slider['details'],
				'buttonUrl' => $slider['url'],
				'source' => $slider['featureImage']
			];
			$slider_value = !empty($this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value : '[]';

			$arr_data = json_decode($slider_value, true);
			// Push user data to array
			array_push($arr_data, $data);

			$jsondata = json_encode($arr_data);
			$data = [
				"setting_value" => $jsondata,
			];
			$this->common_model->update($data, 'setting_name', 'home_slider', 'setting');

			$data['slider'] = $this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value;

			$this->session->set_flashdata(array('error' => 0, 'msg' => 'Slider Added Done'));

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}

	public function deleteslider($id){
		$slider_value = !empty($this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value : '[]';

		$arr_data = json_decode($slider_value, true);

		unset($arr_data[$id]);

		$jsondata = json_encode($arr_data);

		$data = [
			"setting_value" => $jsondata,
		];
		$this->common_model->update($data, 'setting_name', 'home_slider', 'setting');

		$this->session->set_flashdata(array('error' => 0, 'msg' => 'Slider Deleted Done'));

		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
}
