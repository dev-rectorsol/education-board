<?php
class Subject_model extends CI_Model {
public function __construct()
      {
              $this->load->database();
      }

         //-- select function
    function select(){
        $this->db->select();
        $this->db->from('subject');
        $this->db->order_by('subject_id','DESC');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
     function select_Lesson(){
        $this->db->select();
        $this->db->from('lesson');
        $this->db->order_by('created_at','DESC');
        $query = $this->db->get();
        $query = $query->result_array();

        return $query;
    }
    function select_by_id($id){
        $this->db->select('*');
        $this->db->from('subject');
        $this->db->where('subject_id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    function select_Lesson_by_id($id){
        $this->db->select('lesson.name as name,subject_meta.id as id');
        $this->db->from('subject_meta ');
        $this->db->join('lesson ','subject_meta.lesson_id=lesson.lesson_id ');
        $this->db->where('subject_id',$id);
        $query = $this->db->get();

        return $query->result_array();
    }
    function getMaxSerial($id){
        $this->db->select('max(serial) as id');
        $this->db->from('subject_meta');
        $this->db->where('subject_id',$id);
        $query = $this->db->get();
        return $query->row('id');

    }

    public function get_sujcect_by_name($name){
      $sql = "SELECT subject_id AS id, name AS text FROM subject
              WHERE name LIKE '{$name}%'
              UNION
              SELECT testid AS id, CONCAT(title, ' - (test serise)') AS text FROM tests
              WHERE title LIKE '{$name}%'
              ";

              $result = $this->db->query($sql);
              return $result->result();
    }

    public function select_subject_curriculum_by_id($id){
      $this->db->select('subject_meta.*, lesson.name');
      $this->db->from('subject_meta');
      $this->db->join('lesson', 'subject_meta.lesson_id = lesson.lesson_id', 'INNER');
      $this->db->where('subject_meta.subject_id', $id);
      $this->db->order_by('subject_meta.serial', 'ASC');
      $query = $this->db->get();
      return $query->result_array();
    }

    public function check_curriculum($id){
      $data = [
        'subject_id' => $id,
      ];
      $this->db->delete('subject_meta', $data);
      return;
    }
  }
