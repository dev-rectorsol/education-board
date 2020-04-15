<?php
class Lesson_model extends CI_Model {
  public function __construct()
          {
                  $this->load->database();
          }

         //-- select function
    function select(){
        $this->db->select();
        $this->db->from('lesson');
        $this->db->order_by('lesson_id','DESC');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }

    function select_list(){
      $sql = 'SELECT lesson.*, COUNT(videos.videoid) AS lacturcount FROM lesson
              LEFT JOIN videos ON lesson.lesson_id = videos.nodeid
              GROUP BY lesson.lesson_id';
      $result = $this->db->query($sql);
      return $result->result_array();
    }
    public function select_by_id($id){
      return $this->db->get_where('lesson', array('lesson_id' => $id))->row();
    }
}
