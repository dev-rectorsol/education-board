<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends CI_Controller {

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
		}
		public function index()
		{
			$data= array();
			$temp = array();
	    $data['page'] ='category';
	    $data['tags'] =  $this->common_model->select('tags');
			$data['main_content']= $this->load->view('tag/add',$data, true);
			$this->load->view('index',$data);
		}
    public function add()
		{
			if($_POST){
			 $data1=$this->security->xss_clean($_POST);
				$tag=[
					'title' => $data1['name'],
				];
				$id = $this->common_model->insert($tag,'tags');
				if ($id) {
					$this->session->set_flashdata(array('error' => 0, 'msg' => 'Tag Create Done'));
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}  else {
					$this->session->set_flashdata(array('error' => 1, 'msg' => 'Tag Creation Failed'));
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
			} else {
				$this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
		}

		 public function delete($id)
			{
            $data1=[
							'port'=> $id,
							'type' => 'tag'
						];
            $this->common_model->delete(array('id' => $id),'tags');
            $this->common_model->deleteindex($data1);
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
    	}
    public function Edit($id)
		{
			if($_POST){
				 $data1=$this->security->xss_clean($_POST);
	             $aim=[
	            'name' => $data1['name'],
	            'parent' => $data1['parent'],
	        ];
	           $this->common_model->update($aim,'id',$id,'category');
					redirect(base_url() . 'admin/category', 'refresh');
			}
		}
}
