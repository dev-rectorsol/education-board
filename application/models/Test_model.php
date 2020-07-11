<?php
class Test_model extends CI_Model {

      public function __construct()
      {
              $this->load->database();
      }

         //-- select function
      function select_list(){
        $sql = 'SELECT testid, nodeid, title, duration, nofqus, totalno, is_publish, created FROM tests ORDER BY id DESC';
        $result = $this->db->query($sql);
        return $result->result_array();
      }
      public function select_by_id($id){
        return $this->db->get_where('tests', array('testid' => $id))->row();
      }


      public function select_test_list($limit, $start) {
        $sql = "SELECT testid, title, slug, duration, level, nofqus, created FROM tests
                WHERE deleted = 0
                GROUP BY testid
                ORDER BY id DESC
                LIMIT {$start}, {$limit}";
        $query = $this->db->query($sql);
        return $query->result_array();
      }
      public function select_test_list_level($level, $limit, $start) {
        $sql = "SELECT testid, title, slug, duration, level, nofqus, created FROM tests
                WHERE deleted = 0 AND level = '{$level}'
                GROUP BY testid
                ORDER BY id DESC
                LIMIT {$start}, {$limit}";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      public function select_test_single($id){
        $sql = "SELECT * FROM tests WHERE  tests.testid = '{$id}'
                AND  tests.deleted = 0";
        $query = $this->db->query($sql);
        return $query->row();
      }

      public function get_courses_by_name($name){
        $this->db->select('course_id AS id, name AS text');
        $this->db->from('course');
        $this->db->where('name LIKE', $name.'%');
        $result = $this->db->get();
        return $result->result();
      }

      public function get_count($table, $level) {
        if ($level == 'all') {
          return $this->db->where( 'is_publish', 1 )->where( 'deleted',  0 )->count_all_results($table);
        }else{
          return $this->db->where( 'is_publish', 1 )->where( 'deleted',  0 )->where('course_type' , $level)->count_all_results($table);
        }
      }
}
