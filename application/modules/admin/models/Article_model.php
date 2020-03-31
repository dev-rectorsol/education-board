<?php
class Article_model extends CI_Model {
public function __construct()
        {
                $this->load->database();
        }
        function select($table){
        $this->db->select();
        $this->db->from($table);
        $this->db->order_by('postid','desc');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
    function getMaxId(){
        $this->db->select('max(postid) as id');
        $this->db->from('article');
        
        $query = $this->db->get();
        return $query->row('id');
       
    }
public  function select_published(){
        $this->db->select();
        $this->db->from('article');
        $this->db->where('is_publish','1');
        $this->db->order_by('postid','desc');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
   public  function select_draft(){
        $this->db->select();
        $this->db->from('article');
        $this->db->where('is_publish','0');
        $this->db->order_by('postid','desc');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
    
public  function select_deleted(){
        $this->db->select();
        $this->db->from('article');
        $this->db->where('deleted','1');
        $this->db->order_by('postid','desc');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
    
}