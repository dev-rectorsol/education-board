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
        $this->db->select('AUTO_INCREMENT'); 
        $this->db->from('information_schema.TABLES');
         $this->db->where('TABLE_SCHEMA','education_board');
         $this->db->where('TABLE_NAME','article');
        $query = $this->db->get();
        return $query->row('AUTO_INCREMENT');
       
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