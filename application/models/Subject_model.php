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
      $this->db->select('subject_id, name');
      $this->db->from('subject');
      $this->db->where('name LIKE', $name.'%');
      $result = $this->db->get();
      return $result->result();
    }
  }
