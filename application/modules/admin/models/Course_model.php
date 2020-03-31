<?php
class Course_model extends CI_Model {
public function __construct()
        {
                $this->load->database();
        }
        function select($table){
        $this->db->select();
        $this->db->from($table);
        $this->db->order_by('courseid','Desc');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
function getMaxId(){
        $this->db->select('max(courseid) as id');
        $this->db->from('course');
        
        $query = $this->db->get();
        return $query->row('id');
       
    }
}