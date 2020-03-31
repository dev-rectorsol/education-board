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
             $this->load->model('Article_model');
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
            $max= $this->Article_model->getMaxId();
           $max =(int)substr($max,1);
           $id= "P".($max+1);
        if($data1['submit']=='save'){
           
            $article=[
                'postid' =>$id,
            'title' => $data1['name'],
            'content' => $data1['content'],
            'slug' => $data1['slug'],
            'created_at	' => date('Y-m-d:h-m-s'),
            'deleted' => '0',
            'is_publish' => '0',

        ];
          $this->Common_model->insert($article,'article');
         
        }
        if($data1['submit']=='publish'){
          
                $article=[
                     'postid' =>$id,
               'title' => $data1['name'],
            'content' => $data1['content'],
             'slug' => $data1['slug'],
            'created_at	' => date('Y-m-d:h-m-s'),
            'deleted' => '0',
            'public_at	' => date('Y-m-d:h-m-s'),
            'is_publish' => '1'

        ]; 
         $this->Common_model->insert($article,'article');
           
        }
        $tag=$_POST['tag'];
		  foreach($tag as $row){
			$data=[
            'root' => $id,
			'port' => $row,
			'type' =>'tag'
        ];
		 $this->Common_model->insert($data,'indexing');
		  }
		    $category=$_POST['category'];
		  foreach($category as $row){
			$data=[
            'root' => $id,
			'port' => $row,
			'type' =>'category'
        ];
		 $this->Common_model->insert($data,'indexing');
		  }
       redirect(base_url() . 'admin/article', 'refresh');    
	}
	}
    public function View()
	{
	 $data['page'] ='article';
       
        $data['article']=  $this->Article_model->select_published();
        $data['main_content']= $this->load->view('Article/View',$data, true);
		$this->load->view('index',$data);
    }
     public function viewDraft()
	{
	 $data['page'] ='article';
       
        $data['article']=  $this->Article_model->select_draft();
        $data['main_content']= $this->load->view('Article/ViewDraft',$data, true);
		$this->load->view('index',$data);
    }
     public function viewDeleted()
	{
	 $data['page'] ='article';
       
        $data['article']=  $this->Article_model->select_deleted();
        $data['main_content']= $this->load->view('Article/ViewDeleted',$data, true);
		$this->load->view('index',$data);
	}
 public function Delete($id)
	{
           $article=[
             'is_publish' => '0', 
            'deleted' => 1,];
            $this->Common_model->update($article,'postid',$id,'article');
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
           $this->Common_model->update($aim,'postid',$id,'article');
			redirect(base_url() . 'admin/article', 'refresh');
	}
	}
}
