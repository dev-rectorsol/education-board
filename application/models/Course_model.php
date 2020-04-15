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
     function select_subject(){
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
  }
