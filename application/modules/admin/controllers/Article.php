<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

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
	public function index()
	{
		$data= array();
    $data['page'] ='article';
    $data['tag']=  $this->common_model->select('tags');
		$data['category']=  $this->common_model->select('category');
		$data['main_content']= $this->load->view('article/add',$data, true);
		$this->load->view('index',$data);
    }
    public function Save()
		{
			if($_POST){
				// pre($_POST);exit;
					$data1=$this->security->xss_clean($_POST);
					$postid = getCustomId('post');
	        if ($data1['submit'] == 'save') {
	            $article = [
		            'postid' => $postid,
		            'title' => $data1['name'],
		            'slug' => $data1['slug'],
		            'content' => $_POST['content'],
		            'created_by	' => $this->session->userdata('userID'),
							];
							$status = $this->common_model->insert($article, 'article');
		 				 if (!$status) {
							 try {
								 $this->common_model->indexing($data1, $postid);
							 } catch (\Exception $e) {
								 echo 'error :  ' .  $e->getMessage();
							 }
		 					$this->session->set_flashdata(array('status' => 1, 'msg' => 'Article Save in Draft Successfully'));
		 					redirect(base_url() . 'admin/article', 'refresh');

		 				}else {

		 					$this->session->set_flashdata(array('status' => 0, 'msg' => 'Article Save in Draft faild!'));
		 					redirect(base_url() . 'admin/article', 'refresh');

		 				}

	        } elseif ($data1['submit'] == 'publish') {
							$article=[
		  					'postid' => $postid,
								'title' => $data1['name'],
								'slug' => $data1['slug'],
								'content' => $_POST['content'],
								'created_by	' => $this->session->userdata('username'),
								'public_at	' => current_datetime(),
								'is_publish' => '1'
							];
		         $status = $this->common_model->insert($article, 'article');
						 if (!$status) {
							 try {
								 $this->common_model->indexing($data1, $postid);
							 } catch (\Exception $e) {
								 echo 'error :  ' .  $e->getMessage();
							 }
							$this->session->set_flashdata(array('status' => 1, 'msg' => 'Article Publish Successfully'));
							redirect(base_url() . 'admin/article', 'refresh');

						}else {

							$this->session->set_flashdata(array('status' => 0, 'msg' => 'Article Publishing faild!. Try again'));
							redirect(base_url() . 'admin/article', 'refresh');
						}
				 } else {
					 $this->session->set_flashdata(array('status' => 0, 'msg' => 'This type of action is not allowed'));
					 redirect(base_url() . 'admin/article', 'refresh');
				 }
			}
		}
    public function View()
		{
		 	$data['page'] ='article';
	    $data['article']=  $this->article_model->select_published();
	    $data['main_content']= $this->load->view('article/View',$data, true);
			$this->load->view('index',$data);
	  }
     public function viewDraft()
	{
	 $data['page'] ='article';

        $data['article']=  $this->article_model->select_draft();
        $data['main_content']= $this->load->view('article/ViewDraft',$data, true);
		$this->load->view('index',$data);
    }
     public function viewDeleted()
	{
	 $data['page'] ='article';

        $data['article']=  $this->article_model->select_draft();
        $data['main_content']= $this->load->view('article/ViewDeleted',$data, true);
		$this->load->view('index',$data);
	}
 public function Delete($id)
	{
           $article=[

            'deleted' => 1,];
            $this->common_model->update($article,'id',$id,'article');
            redirect(base_url() . 'admin/article', 'refresh');
    }
    public function edit($id)
		{
			$data = array();
			if($_POST){

			}else {
				$data = $this->article_model->getArticleByRoot($id);
				$data['main_content']= $this->load->view('article/ViewDeleted',$data, true);
				$this->load->view('index',$data);
			}
	}
}
