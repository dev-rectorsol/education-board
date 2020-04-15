<?php
class Article_model extends CI_Model {
        public function __construct()
        {
          $this->load->database();
        }

        function select_by_id($id){
            $this->db->select("*");
            $this->db->from('article');
            $this->db->where('postid', $id);
            $query = $this->db->get();
            return $query->row();
        }

        public function select_published() {
             $this->db->select("*");
             $this->db->from('article_view');
             $this->db->where('is_publish','1');
             $query = $this->db->get();
             $query = $query->result_array();
             return $query;
         }
        public  function select_draft(){
             $this->db->select();
             $this->db->from('article');
             $this->db->where('is_publish','0');
             $this->db->order_by('created_at','ASC');
             $query = $this->db->get();
             $query = $query->result_array();
             return $query;
         }

        public  function select_deleted(){
             $this->db->select();
             $this->db->from('article');
             $this->db->where('deleted','1');
             $this->db->order_by('created_at','ASC');
             $query = $this->db->get();
             $query = $query->result_array();
             return $query;
         }

        public  function getArticleByRoot($id){
             $this->db->select('*');
             $this->db->from('article');
             $this->db->where('deleted','1');
             $this->db->order_by('created_at','ASC');
             $query = $this->db->get();
             $query = $query->result_array();
             return $query;
         }

}
