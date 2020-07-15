<?php
class Course_model extends CI_Model {
public function __construct()
        {
                $this->load->database();
        }

         //-- select function
    function select(){
        $this->db->select();
        $this->db->from('course');
        $this->db->order_by('course_id','DESC');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
  
  function get_doc_by_id($id)
  {
    $sql = 'SELECT details FROM gallery
               JOIN docfile ON gallery.id = docfile.nodeid
              WHERE docfile.docid ="'.$id.'"
            ';
    $result = $this->db->query($sql);
    return $result->result_array();
  }
  function select_list()
  {
    $sql = 'SELECT lesson.name, docfile.docid  FROM lesson
              LEFT JOIN docfile ON lesson.lesson_id = docfile.root
              WHERE lesson.lesson_type = "pdf"
            ';
    $result = $this->db->query($sql);
    return $result->result_array();
  }
     function select_subject() {
        $this->db->select();
        $this->db->from('subject');
        $this->db->order_by('created_at','DESC');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
    function select_by_id($id){
        $this->db->select();
        $this->db->from('course');
        $this->db->where('course_id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    function select_Subject_by_id($id){
        $this->db->select('subject.name as name,course_meta.id as id');
        $this->db->from('course_meta ');
        $this->db->join('subject ','course_meta.subid=subject.subject_id ');
        $this->db->where('course_id',$id);
        $query = $this->db->get();

        return $query->result_array();
    }
function getMaxId(){
        $this->db->select('max(course_id) as id');
        $this->db->from('course');

        $query = $this->db->get();
        return $query->row('id');

    }
    function getMaxSerial($id){
        $this->db->select('max(serial) as id');
        $this->db->from('course_meta');
        $this->db->where('course_id',$id);
        $query = $this->db->get();
        return $query->row('id');

    }

      public function get_courseNameById($id){
        $this->db->select('course_id, name');
        return $this->db->get_where('course', array('course_id' => $id))->row();
      }

      public function select_course_curriculum_by_id($id){
        $sql = "SELECT course_meta.*, subject.name as name FROM course_meta
                INNER JOIN subject ON course_meta.subid = subject.subject_id
                WHERE course_meta.course_id = '{$id}'
                UNION
                SELECT course_meta.*, tests.title as name FROM course_meta
                INNER JOIN tests ON course_meta.subid = tests.testid
                WHERE course_meta.course_id = '$id'
                ";
                $result = $this->db->query($sql);
                return $result->result_array();
      }

      public function check_curriculum($id){
        $data = [
          'course_id' => $id,
        ];
        $this->db->delete('course_meta', $data);
        return;
      }

      public function select_course_list($limit, $start) {
        $sql = "SELECT products.*, course.*, thumbnail.image, GROUP_CONCAT(tag.port) AS tags, GROUP_CONCAT(category.port) AS category FROM products
                INNER JOIN product_meta ON products.product_id = product_meta.product_id
                INNER JOIN course on product_meta.source = course.course_id
                LEFT JOIN indexing AS tag ON course.course_id = tag.root AND tag.type = 'tag'
                LEFT JOIN indexing AS category ON course.course_id = category.root AND category.type = 'category'
                LEFT JOIN thumbnail ON course.course_id = thumbnail.root
                WHERE products.deleted = 0
                GROUP BY products.product_id
                ORDER BY products.id DESC
                LIMIT {$start}, {$limit}";
        $query = $this->db->query($sql);
        return $query->result_array();
      }
      public function select_course_list_level($level, $limit, $start) {
        $sql = "SELECT products.*, course.*, thumbnail.image, GROUP_CONCAT(tag.port) AS tags, GROUP_CONCAT(category.port) AS category FROM products
                INNER JOIN product_meta ON products.product_id = product_meta.product_id
                INNER JOIN course on product_meta.source = course.course_id
                LEFT JOIN indexing AS tag ON course.course_id = tag.root AND tag.type = 'tag'
                LEFT JOIN indexing AS category ON course.course_id = category.root AND category.type = 'category'
                LEFT JOIN thumbnail ON course.course_id = thumbnail.root
                WHERE products.deleted = 0 AND course.course_type = '{$level}'
                GROUP BY products.product_id
                ORDER BY products.id DESC
                LIMIT {$start}, {$limit}";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      public function select_course_single($id){
        $sql = "SELECT course.*, thumbnail.image, GROUP_CONCAT(tag.port) AS tags, GROUP_CONCAT(category.port) AS category FROM course
                LEFT JOIN indexing AS tag ON course.course_id = tag.root AND tag.type = 'tag'
                LEFT JOIN indexing AS category ON course.course_id = category.root AND category.type = 'category'
                LEFT JOIN thumbnail ON course.course_id = thumbnail.root
                WHERE course.course_id = '{$id}'
                AND  course.deleted = 0";
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
