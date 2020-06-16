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

         public function featured_article(){
             $sql = 'SELECT * FROM article_view
                      WHERE postid IN (
                        SELECT indexing.root FROM indexing
                        INNER JOIN category ON indexing.port = category.id AND indexing.type = "category"
                        WHERE category.name = "FEATURED"
                        ORDER BY indexing.id DESC
                      )
                      LIMIT 5';
            $query = $this->db->query($sql);
            return $query->result_array();
         }

         public function __article($category = ''){
             $sql = "SELECT * FROM article_view
                      WHERE postid IN (
                        SELECT indexing.root FROM indexing
                        INNER JOIN category ON indexing.port = category.id AND indexing.type = 'category'
                        WHERE category.name = '{$category}'
                        ORDER BY indexing.id DESC
                      )
                      LIMIT 5";
            $query = $this->db->query($sql);
            return $query->result_array();
         }

         public function article_single_view($id){
           $this->db->select('*');
           $this->db->from('article_view');
           $this->db->where('postid', $id);
           $query = $this->db->get();
           $query = $query->row();
           return $query;
         }

         public function select_blog_list($limit, $start){
           $this->db->select('*');
           $this->db->from('article_view');
           $this->db->limit($limit, $start);
           $query = $this->db->get();
           $query = $query->result_array();
           return $query;
         }

         public function get_count() {
          $result = $this->db->query('SELECT COUNT(*) AS count FROM article_view WHERE is_publish = 1 AND deleted = 0');
          return !empty($result->row()) ? $result->row()->count : 0;
        }

}
