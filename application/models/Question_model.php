<?php
class Question_model extends CI_Model {
  public function __construct()
          {
                  $this->load->database();
          }

         //-- select function
    function select_list(){
      $sql = 'SELECT * FROM questions ORDER BY id DESC';
      $result = $this->db->query($sql);
      return $result->result_array();
    }
    public function select_by_id($id){
      return $this->db->get_where('questions', array('qusid' => $id))->row();
    }

    public function get_answer($node) {
      return $this->db->select('answer')->get_where('questions', array('qusid' => $node))->row();
    }
    public function get_options($node) {
      return $this->db->get_where('question_meta', array('qusid' => $node))->result_array();
    }
}
