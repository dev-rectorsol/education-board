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
}
