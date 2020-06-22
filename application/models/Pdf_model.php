<?php
class Pdf_model extends CI_Model {
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

    function select_list() {
      $sql = 'SELECT lesson.*, COUNT(docfile.docid) AS docfile FROM lesson
              LEFT JOIN docfile ON lesson.lesson_id = docfile.root
              WHERE lesson.lesson_type = "pdf"
              GROUP BY lesson.lesson_id';
      $result = $this->db->query($sql);
      return $result->result_array();
    }
    public function select_by_id($id){
      return $this->db->get_where('lesson', array('lesson_id' => $id))->row();
    }

    public function get_documents_by_name($name){
      $this->db->select('id, name AS text');
      $this->db->from('gallery');
      $this->db->where('name LIKE', $name.'%');
      $this->db->where_in('filetype', DOC_EXT);
      $result = $this->db->get();
      return $result->result();
    }


    public function get_documents($node) {
      $sql = "SELECT docfile.docid, gallery.name, gallery.details, docfile.download FROM docfile
              INNER JOIN gallery ON docfile.nodeid = gallery.id
              WHERE docfile.root = '{$node}'";
              $result = $this->db->query($sql);
              return $result->result_array();
    }
}
