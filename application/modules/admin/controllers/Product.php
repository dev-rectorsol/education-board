<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
             $this->load->model('product_model');
             $this->load->model('course_model');
	}
		public function index()
		{
			$data= array();
	    $data['page'] ='Product';
			$data['course'] = $this->common_model->select('course');
			$data['main_content']= $this->load->view('product/add',$data, true);
			$this->load->view('index',$data);
	  }

		public function list(){
			$data= array();
	    $data['page'] ='Product';
			$data['product'] = $this->product_model->select();
			$data['main_content']= $this->load->view('product/list-view',$data, true);
			$this->load->view('index',$data);
		}

	  public function add()
		{
			if($_POST){
				$data1=$_POST;
				$id = $this->common_model->get_last_id('products');
				if($data1['submit']=='save') {
					$product=[
						'product_id' => getCustomId($id, 'pro'),
						'product' => $data1['name'],
						'price' => $data1['price'],
						'discount' => $data1['discount'],
						'created_at' => current_datetime()
					];
				} else {
					$product=[
						'product_id' => getCustomId($id, 'pro'),
						'product' => $data1['name'],
						'price' => $data1['price'],
						'discount' => $data1['discount'],
						'created_at' => current_datetime(),
						'is_publish' => 1
					];
				}
				if ( $this->common_model->insert($product,'products') ) {
				  $this->common_model->product_mata($_POST, $product['product_id']);
					if ( isset($_POST['featureImage']) ) {
						// if added feature image
						$this->common_model->addThumb($_POST['featureImage'], $product['product_id']);
					}
				 	$this->session->set_flashdata(array('error' => 0, 'msg' => 'Product Create Done'));
				 	redirect(base_url('admin/product/edit/').$product['product_id'], 'refresh');
			 }  else {
				 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Product Creation Failed'));
				 redirect($_SERVER['HTTP_REFERER'], 'refresh');
			 }
		 }else{
			 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
			 redirect($_SERVER['HTTP_REFERER'], 'refresh');
		 }
		}

		public function edit($id){
			$data = array();
			$data['page'] = 'Edit Product';
			$data['product'] = $this->product_model->select_by_id($id);
			$data['image'] = $this->common_model->getThumByRoot($id);
			$data['course'] = $this->common_model->select('course');
			$data['main_content'] = $this->load->view('product/edit-view',$data, true);
			$this->load->view('index',$data);
		}

		public function update(){
			if($_POST){
				$data=$this->security->xss_clean($_POST);
				if($data['submit']=='save') {
					$product=[
						'product' => $data['name'],
						'price' => filter_var($data['price'], FILTER_SANITIZE_NUMBER_INT),
						'discount' => filter_var($data['discount'], FILTER_SANITIZE_NUMBER_INT),
						'is_publish' => 0,
					];
				} else if($data['submit']=='publish'){
					$product=[
						'product' => $data['name'],
						'price' => filter_var($data['price'], FILTER_SANITIZE_NUMBER_INT),
						'discount' => filter_var($data['discount'], FILTER_SANITIZE_NUMBER_INT),
						'is_publish' => 1,
					];
				} else {
					$product=[
						'product' => $data['name'],
						'price' => filter_var($data['price'], FILTER_SANITIZE_NUMBER_INT),
						'discount' => filter_var($data['discount'], FILTER_SANITIZE_NUMBER_INT),
					];
				}
				if ( $this->common_model->update($product, 'product_id', $data['product_id'], 'products') ) {

					$this->common_model->update_product_mata($_POST, $data['product_id']);

					if ( isset($_POST['featureImage']) ) {
						// if updated feature image
						$this->common_model->updateThumb($_POST['featureImage'], $data['product_id']);
					}


				 	$this->session->set_flashdata(array('error' => 0, 'msg' => 'Product Update Done'));
				 	redirect(base_url('admin/product/edit/').$data['product_id'], 'refresh');
			 }  else {
				 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Product Update Failed'));
				 redirect($_SERVER['HTTP_REFERER'], 'refresh');
			 }
		 }else{
			 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
			 redirect($_SERVER['HTTP_REFERER'], 'refresh');
		 }
		}




 public function delete($id)
	{
    	$this->product_model->delete_product($id);
      redirect($_SERVER['HTTP_REFERER'], 'refresh');
  }

}
