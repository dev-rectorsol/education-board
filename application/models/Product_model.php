<?php
class Product_model extends CI_Model {
    public function __construct()
    {
      $this->load->database();
    }

    function select_by_id($id){
        $this->db->select('products.*, GROUP_CONCAT(product_meta.source) AS source');
        $this->db->from('products');
        $this->db->join('product_meta', 'products.product_id = product_meta.product_id', 'INNER');
        $this->db->where('products.product_id', $id);
        $this->db->group_by('products.product_id');
        $query = $this->db->get();
        return $query->row();
    }

    function select(){
        $this->db->select('products.*, GROUP_CONCAT(product_meta.source) AS source');
        $this->db->from('products');
        $this->db->join('product_meta', 'products.product_id = product_meta.product_id', 'INNER');
        $this->db->group_by('products.product_id');
        $this->db->order_by('products.id ', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function select_product_by_course_id($id){

    }

    public function delete_product($id) {
      $sql = "DELETE products, product_meta FROM products
              LEFT join product_meta ON products.product_id = product_meta.product_id
              WHERE products.product_id = '{$id}'";
              $result = $this->db->query($sql);
              return $result;
    }
}
