<?php
class Classroom_model extends CI_Model {
  public function __construct()
  {
    $this->load->database();
  }

         //-- select function
    function select_all(){
        $sql = 'SELECT course.*, COUNT(classroom.assign_id) as students FROM course
                INNER JOIN users_course AS classroom ON course.course_id = classroom.course_id
                GROUP BY classroom.course_id
                ORDER BY classroom.assign_date DESC';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function check($data){
      return $this->db->select('COUNT(*) AS count')->get_where('users_course', array('user_id' => $data['user_id'], 'course_id' => $data['course_id']))
      ->row()->count;
    }

  }
