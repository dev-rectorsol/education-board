<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
    $data['category'] =  $this->common_model->select('category');
		$data['main_content']= $this->load->view('category/add',$data, true);
		$this->load->view('index',$data);
	}
	public function icons(){
		header('Content-Type: text/html; charset=UTF-8');
		echo $this->load->view('category/icons');
	}
    public function add()
		{
			if($_POST){
			 $data1=$this->security->xss_clean($_POST);
				$aim=[
					'name' => $data1['name'],
					'parent' => (!empty($data1['parent'])) ? $data1['parent'] : null,
					'icon' => isset($data1['icon']) ? $data1['icon'] : null,
				];
				$id = $this->common_model->insert($aim,'category');
				if ($id) {
					$this->session->set_flashdata(array('error' => 0, 'msg' => 'Category Create Done'));
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}  else {
					$this->session->set_flashdata(array('error' => 1, 'msg' => 'Category Creation Failed'));
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
				}
			} else {
				$this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
		}

      public function AddTag()
			{
				if($_POST){
			 $data1=$this->security->xss_clean($_POST);
		         $tag=[
		            'title' => $data1['name'],
		        ];
            $this->common_model->insert($tag,'tags');
			redirect(base_url() . 'admin/category', 'refresh');
				}
			}
 public function delete($id)
	{
		$data1=[
			'port'=> $id,
			'type' => 'category'
		];
		$result = $this->common_model->get_subcategory($id);
		if (is_array($result)) {
			foreach ($result as $value) {
					$this->common_model->update(array('parent' => null), 'id', $value->id, 'category' );
			}
		}
		$this->common_model->delete(array('id' => $id),'category');
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
