<?php
class Indexing_model extends CI_Model {
  public function __construct()
          {
                  $this->load->database();
          }

  public function get_root(array $port, $type){

    if (is_array($port)) {

      $dataset = array();

      foreach ($port as $value) {
        // code...
        $dataset[] = $this->db->select('root')->get_where('indexing', array('port' => $value['id'], 'type' => $type))->result_array();
      }

      return $dataset;
    }

  }

}
