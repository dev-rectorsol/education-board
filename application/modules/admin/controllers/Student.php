<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {


	public function __construct()
  {
      parent::__construct();
			if(check()){
				if(!isAdmin($this->session->userdata('roles')))
					redirect(base_url(), 'refresh');
      }else{
				 	redirect(base_url(), 'refresh');
			}
			$this->load->model('Common_model');
			$this->load->model('user');
  }
	public function index() {
		$data= array();
		$data['page'] ='Add Student';
		$data['main_content']= $this->load->view('user/add',$data, true);
		$this->load->view('index',$data);
	}

	public function add(){
		if($_POST) {

			$lastid = $this->common_model->get_last_id('logme');
			$data = [
				'logid' => getCustomId($lastid, 'EDO'),
				'email' => $_POST['email'],
				'phone' => $_POST['phone'],
				'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
				'joindate' => current_datetime(),
			];
			$id =  $this->common_model->insert($data, 'logme');
			if($id) {
				$data = [
					'user_id' => getCustomId($lastid, 'EDO'),
					'name' => $_POST['name'],
					'details' => json_encode(array(
						'city' => $_POST['city'],
						'states' => $_POST['states'],
						'bio' => $_POST['content'],
					))
				];
				$id = $this->common_model->insert($data, 'user_details');
				if($id) {
					$this->common_model->insert(array('root' => getCustomId($lastid, 'EDO')), 'thumbnail');
					$data = [
						'user_id' => getCustomId($lastid, 'EDO'),
						'role_id' => $_POST['role'],
					];
					if($this->user->addRole($data)) {
						$this->session->set_flashdata(array('error' => 0, 'msg' => 'User Account Created Done'));
						redirect(base_url('admin/student/edit/').$data['user_id'], 'refresh');
						// redirect(base_url('admin/student/'), 'refresh');
					}
				}
			}
		 } else {
			 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
			 redirect($_SERVER['HTTP_REFERER'], 'refresh');
		 }
	}

	public function edit($id){
		$check = $this->common_model->checkIdExist(array('logid' => $id), 'users');
		if($check) {
			$data= array();
			$data['page'] ='Edit Student Account';
			$data['user'] = $this->db->get_where('users', array('logid' => $id))->row();
			$data['meta'] = json_decode($this->db->get_where('users', array('logid' => $id))->row()->details);
			$data['main_content']= $this->load->view('user/edit-view',$data, true);
			$this->load->view('index',$data);
		}else{
			echo json_encode(array('status' => false, 'msg' => "{$id} Not Found." ));
		}
	}

	public function update(){
		if($_POST) {
			$uid = $_POST['user_id'];
			$check = $this->common_model->checkIdExist(array('logid' => $uid), 'users');
			if($check){
				$data = [
					'email' => $_POST['email'],
					'phone' => $_POST['phone'],
				];
				if (!empty($_POST['password'])) {
					$data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
				}
				$id = $this->common_model->update($data, 'logid', $uid, 'logme');
				if($id) {
					 $details = json_decode($this->db->get_where('user_details', array('user_id' => $uid))->row()->details);
					 $details = (array)$details;
					 $result = array_merge($details, array(
						'city' => $_POST['city'],
						'states' => $_POST['states'],
						'bio' => $_POST['content'],
					));
					$data = [
						'name' => $_POST['name'],
						'details' => json_encode($result)
					];
					$id = $this->common_model->update($data, 'user_id', $uid, 'user_details');
					if($id) {
						$this->session->set_flashdata(array('error' => 0, 'msg' => 'User Account Updated succesfully'));
						redirect(base_url('admin/student/edit/').$uid, 'refresh');
					}
				}
			}else{
				echo json_encode(array('status' => false, 'msg' => "{$id} Not Found." ));
			}
		 } else {
			 $this->session->set_flashdata(array('error' => 1, 'msg' => 'Request not Allowed'));
			 redirect($_SERVER['HTTP_REFERER'], 'refresh');
		 }
	}


	public function view() {
		$data= array();
		$data['page'] ='All Students';
		$data['users'] = $this->user->all();
		$data['main_content']= $this->load->view('user/view',$data, true);
		$this->load->view('index',$data);
	}


	public function get_city() {
		if ($_POST) {
			$city=$this->security->xss_clean($_POST);
			$data = $this->common_model->get_city_by_name($city['search']);
			echo json_encode($data);
		}
	}

	public function get_states() {
		if ($_POST) {
			$city=$this->security->xss_clean($_POST);
			$data = $this->common_model->get_states_by_name($city['search']);
			echo json_encode($data);
		}
	}

	public function check_exist(){
		if ($_POST) {
			$data = $this->security->xss_clean($_POST);
			$email = $this->common_model->check_email($data['email']);
			$phone = $this->common_model->check_phone($data['phone']);

			if($email){
				echo json_encode(array('status' => 1, 'msg' => 'Email already exists'));
			}elseif ($phone) {
				echo json_encode(array('status' => 1, 'msg' => 'Phone already exists'));
			}else {
				echo json_encode(array('status' => 0, 'msg' => 'Email or Phone not exists'));
			}
		}
	}
	public function delete($id){
		$check = $this->common_model->checkIdExist(array('logid' => $id), 'users');
		if ($check) {
			$data = [
				'deleted' => 1
			];
			$id = $this->common_model->update($data, 'logid', $id, 'logme');
			if($id) {
				$this->session->set_flashdata(array('error' => 0, 'msg' => 'User Delete Succesfully'));
 			 redirect($_SERVER['HTTP_REFERER'], 'refresh');
		 }else{
			$this->session->set_flashdata(array('error' => 1, 'msg' => 'Delete Action faild!'));
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		 }
		}else{
			echo json_encode(array('status' => false, 'msg' => "{$id} Not Found." ));
		}
	}

}
