<?php
class Web_model extends CI_Model {
  public function __construct()
          {
                  $this->load->database();
          }
          public function catIdByName($name) {
            $sql = "SELECT id FROM category WHERE name LIKE '{$name}%'";
            $result = $this->db->query($sql);
            if ($result->num_rows() < 1) {
              // if category not match show all category...
              $sql = "SELECT id FROM category";
              $result = $this->db->query($sql);
            }
            return $result->result_array();
          }

}
