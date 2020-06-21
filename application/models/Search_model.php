<?php
class Search_model extends CI_Model {
  public function __construct()
          {
                  $this->load->database();
          }

  public function search_list(array $port){

    if (is_array($port)) {

      $dataset = array();

      foreach ($port as $value) {
        // code...
        if (self::exist($value)) {
          // code...
          $dataset[] = $this->db->select('*')->get_where('searches', array('id' => $value))->row();
        }

      }

      return $dataset;
    }

  }

public function exist($id){
  $result = $this->db->get_where('searches', array('id' => $id));
  if ($result->num_rows() == 1) {
    return $result->row();
  } else {
    return false;
  }
}



}
