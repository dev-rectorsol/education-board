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
            $this->load->model('Common_model');
            // $this->load->model('Article');
	}
	public function index()
	{
		$data= array();
        $data['page'] ='article';
       
        $data['tag']=  $this->Common_model->select('tags');
		$data['category']=  $this->Common_model->select('category');
		$data['main_content']= $this->load->view('Article/add',$data, true);
		$this->load->view('index',$data);
    }
     public function Save()
	{
	if($_POST){
             $data1=$this->security->xss_clean($_POST);
            //  pre($data1);exit;
        if($data1['submit']=='save'){
            $article=[
            'title' => $data1['name'],
            'content' => $data1['content'],
            'created_at	' => date('Y-m-d:h-m-s'),
            'deleted' => '0',
            'is_publish' => '0',

        ];
          $this->Common_model->insert($article,'article');
         
        }
        if($data1['submit']=='publish'){
          
                $article=[
               'title' => $data1['name'],
            'content' => $data1['content'],
            'created_at	' => date('Y-m-d:h-m-s'),
            'deleted' => '0',
            'public_at	' => date('Y-m-d:h-m-s'),
            'is_publish' => '1'

        ]; 
         $this->Common_model->insert($article,'article');
           
            
           
        }
       redirect(base_url() . 'admin/article', 'refresh');    
	}
	}
    public function View()
	{
	 $data['page'] ='article';
       
        $data['article']=  $this->Common_model->select_published();
        $data['main_content']= $this->load->view('Article/View',$data, true);
		$this->load->view('index',$data);
    }
     public function viewDraft()
	{
	 $data['page'] ='article';
       
        $data['article']=  $this->Common_model->select_draft();
        $data['main_content']= $this->load->view('Article/ViewDraft',$data, true);
		$this->load->view('index',$data);
    }
     public function viewDeleted()
	{
	 $data['page'] ='article';
       
        $data['article']=  $this->Common_model->select_draft();
        $data['main_content']= $this->load->view('Article/ViewDeleted',$data, true);
		$this->load->view('index',$data);
	}
 public function Delete($id)
	{
           $article=[
              
            'deleted' => 1,];
            $this->Common_model->update($article,'id',$id,'article');
            redirect(base_url() . 'admin/article', 'refresh');
    }
    public function Edit($id)
	{
		if($_POST){
			 $data1=$this->security->xss_clean($_POST);
		$aim=[
            'title' => $data1['name'],
            'content' => $data1['content'],
        ];
           $this->Common_model->update($aim,'id',$id,'article');
			redirect(base_url() . 'admin/article', 'refresh');
	}
	}
}
