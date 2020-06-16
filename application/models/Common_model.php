<?php
class Common_model extends CI_Model {
public function __construct()
        {
                $this->load->database();
        }
    //-- insert function
	public function insert($data,$table){
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }
    public function get_last_id($table){
      return $this->db->select('MAX(id) AS id')
      ->from($table)
      ->get()->row()->id;
    }

    public function check_email($data){
      $result = $this->db->get_where('logme', array('email' => $data));
      if ($result->num_rows() == 1) {
        return $result->row();
      } else {
        return false;
      }
    }
    public function check_phone($data){
      $result = $this->db->get_where('logme', array('phone' => $data));
      if ($result->num_rows() == 1) {
        return $result->row();
      } else {
        return false;
      }
    }
    public function checkIdExist($data, $table){
      $result = $this->db->get_where($table, $data);
      if ($result->num_rows() == 1) {
        return $result->row();
      } else {
        return false;
      }
    }

    public function Login_check($data){
        $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'AND role='".$data['role']."'" ;
            $this->db->select('*');
            $this->db->from('logme');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() == 1) {
            return $query->result_array();
            } else {
            return false;
            }
        }
    public function Login_check_mobile($data){
        $condition = "phone =" . "'" . $data['mobile']."'AND role='s'" ;
            $this->db->select('*');
            $this->db->from('logme');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() == 1) {
            return $query->result_array();
            } else {
            return false;
            }
        }
         public function check_user($data){

            $this->db->select('*');
            $this->db->from('logme');
            $this->db->where('email',$data['username']);
            $this->db->or_where('phone',$data['username']);
            $this->db->limit(1);
            $query = $this->db->get();
        //    echo $this->db->last_query();exit;
            if ($query->num_rows() == 1) {
              return $query->row();
            } else {
              return false;
            }
        }

        public function get_otp($data){

            $this->db->select('*');
            $this->db->from('message');
            $this->db->where('key',$data['mobile']);
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() == 1) {
            return $query->result_array();
            } else {
            return false;
            }
        }




        public function get_user_view_by_id($id)
        {
          $this->db->select('*');
          $this->db->from('users');
          $this->db->where('logid', $id);
          $this->db->limit(1);
          $query = $this->db->get();
          if ($query->num_rows() == 1) {
            return $query->row();
          } else {
            return false;
          }
        }

        public function get_category_name_by_blogid($id)
        {
          $sql = 'SELECT category.name FROM indexing
                  INNER JOIN category ON indexing.port = category.id AND indexing.type = "category"
                  GROUP BY category.id';

          $query = $this->db->query($sql);
          return $query->row();
        }


public function check_otp($data){

            $this->db->select('*');
            $this->db->from('message');
            $this->db->where('key',$data['mobile']);
            $this->db->where('code',$data['code']);
            $this->db->limit(1);
            $query = $this->db->get();
          // echo $this->db->last_query();exit;
            if ($query->num_rows() == 1) {
            return true;
            }
        }
    //-- edit function
    function edit_option($action, $id, $table){
        $this->db->where('id',$id);
        $this->db->update($table,$action);
        return;
    }

    //-- update function
    function update($action,$field, $id, $table){
        $this->db->where($field,$id);
        $this->db->update($table,$action);
        return true;
    }

    //-- delete function
    function delete($data,$table){

        $this->db->delete($table, $data);
        return;
    }

    function deleteindex($data){
        $this->db->delete('indexing', $data);
        return;
    }

    function select_value($id,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where(array('id' => $id));
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        $query = $query->result_array();
        return $query;
    }

    //-- user role delete function
      function delete_user_role($id,$table){
        $this->db->delete($table, array('user_id' => $id));
        return;
    }
  function select_user(){
        $this->db->select();
        $this->db->from('logme l');
        $this->db->order_by('logid','ASC');
        $this->db->join('user_details u','l.logid = u.user_id','INNER');

        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
function select_user_option($id){
        $this->db->select();
        $this->db->from('logme l');
        $this->db->order_by('logid','ASC');
        $this->db->join('user_details u','l.logid = u.user_id','INNER');

        $this->db->where('logid', $id);
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
    //-- select function
    function select($table){
        $this->db->select();
        $this->db->from($table);
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
function getMaxUserId(){
        $this->db->select('max(logid) as id');
        $this->db->from('logme');

        $query = $this->db->get();
        return $query->row('id');

    }
    //-- select by id
    function select_option($id,$field,$table){
        $this->db->select();
        $this->db->from($table);
        $this->db->where($field, $id);
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }


    // File Upload

    function upload_image($max_size){

            //-- set upload path
            $config['upload_path']  = UPLOAD_FILE . '/' . 'images';
            $config['allowed_types']= 'gif|jpg|png|jpeg';
            $config['max_size']     = '920000';
            $config['max_width']    = '92000';
            $config['max_height']   = '92000';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload("file")) {

                $data = $this->upload->data();

                //-- set upload path
                $source             = UPLOAD_FILE . "/\images/" . $data['file_name'] ;
                $destination_medium = UPLOAD_FILE . "/images/medium/" ;
                $main_img = $data['file_name'];
                // Permission Configuration
                chmod($source, 0777) ;

                /* Resizing Processing */
                // Configuration Of Image Manipulation :: Static
                $this->load->library('image_lib') ;
                $img['image_library'] = 'GD2';
                $img['create_thumb']  = TRUE;
                $img['maintain_ratio']= TRUE;

                /// Limit Width Resize
                $limit_medium   = $max_size ;

                // Size Image Limit was using (LIMIT TOP)
                $limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

                // Percentase Resize
                if ($limit_use > $limit_medium) {
                    $percent_medium = $limit_medium/$limit_use ;
                }


                ////// Making MEDIUM /////////////
                $img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
                $img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;

                // Configuration Of Image Manipulation :: Dynamic
                $img['thumb_marker'] = '_medium-'.floor($img['width']).'x'.floor($img['height']) ;
                $img['quality']      = '100%' ;
                $img['source_image'] = $source ;
                $img['new_image']    = $destination_medium ;

                $mid = $data['raw_name']. $img['thumb_marker'].$data['file_ext'];
                // Do Resizing
                $this->image_lib->initialize($img);
                $this->image_lib->resize();
                $this->image_lib->clear() ;

                //-- set upload path
                $images = UPLOAD_FILE . "/images/medium/" . $mid;
                unlink($source);

                return array(
                    'image' => $images,
                );
            }
            else {
                echo "Failed! to upload images" ;
            }

    }

    function upload_Pdf($max_size){

            //-- set upload path
            $config['upload_path']  = UPLOAD_FILE . '/' . 'document';
            $config['allowed_types']= 'pdf|doc|docx|ppt';
            $config['max_size']     = $max_size;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload("file")) {

                $data = $this->upload->data();

                //-- set upload path
                $source = UPLOAD_FILE . "/\document/" . $data['file_name'] ;
                return array(
                    'doc' => $source,
                );
            }
            else {
                echo "Failed! to upload document" ;
            }

    }

    public function indexing($data, $rootid) {
      if ( isset($data['tag']) ||  isset($data['category']) ) {
        $temp = array();
        $table = 'indexing';
        if (is_array($data['tag'])) {
          foreach ($data['tag'] as $value) {
            $temp['root'] = $rootid;
            $temp['port'] = $value;
            $temp['type'] = 'tag';
            $this->db->insert($table, $temp);
          }
        }
        if (is_array($data['category'])) {
          foreach ($data['category'] as $value) {
            $temp['root'] = $rootid;
            $temp['port'] = $value;
            $temp['type'] = 'category';
            $this->db->insert($table, $temp);
          }
        }
        return;
      }else {
        return;
      }
    }
    public function updateIndexing($data, $rootid) {
      if ( isset($data['tag']) ||  isset($data['category']) ) {
        $temp = array();
        $table = 'indexing';
        $this->db->delete($table, array('root' => $rootid));
        if ( is_array($data['tag']) ) {
          foreach ($data['tag'] as $value) {
            $temp['root'] = $rootid;
            $temp['port'] = $value;
            $temp['type'] = 'tag';
            $this->db->insert($table, $temp);
          }
        }
        if ( is_array($data['category']) ) {
          foreach ($data['category'] as $value) {
            $temp['root'] = $rootid;
            $temp['port'] = $value;
            $temp['type'] = 'category';
            $this->db->insert($table, $temp);
          }
        }
        return;
      }else{
        return;
      }
    }

    public function addLacture($data, $rootid){
        $table = 'videos';
        foreach ($data as $value) {
          $temp = getFileInfo($value);
          if ($temp['status']) {
            $video = [
              'videoid' => getUniqidId('W'),
              'nodeid' => $rootid,
              'type' => 'paid',
              'name' => $temp['basename'],
              'url' => $value,
              'size' => $temp['size'],
              'videotype' => $temp['extension'],
              'time' => getDuration($value)
            ];
            $this->db->insert($table, $video);
          }
        }
        return true;
    }


    public function addThumb($data, $rootid){
      $table = 'thumbnail';
      $data = [
        'root' => $rootid,
        'thumb' => $data,
        'image' => $data,
      ];
      return $this->db->insert($table, $data);
    }
    public function updateThumb($data, $rootid){
      $table = 'thumbnail';
      $this->db->delete($table, array('root' => $rootid));
      $data = [
        'root' => $rootid,
        'thumb' => $data,
        'image' => $data,
      ];
      return $this->db->insert($table, $data);
    }

    public function getThumByRoot($id){
      $this->db->select('thumb', 'image');
      return $this->db->get_where("thumbnail", array('root' => $id))->row();
    }

    public function getVideoByRoot($id){
      return $this->db->select('videoid, nodeid, name, url, size, videotype')
      ->from("videos")
      ->where('nodeid', $id)
      ->get()
      ->result_array();
    }



    public function getIndexCategorys($root){
      $data = array();
      $this->db->select('port');
      $this->db->from('indexing');
      $this->db->WHERE('root', $root);
      $this->db->WHERE('type', 'category');
      $query = $this->db->get();
      $query = $query->result_array();
      foreach ($query as $value) {
        $data[] = $value['port'];
      }
      return $data;
    }

    public function getIndexTags($root){
      $data = array();
      $this->db->select('port');
      $this->db->from('indexing');
      $this->db->WHERE('root', $root);
      $this->db->WHERE('type', 'tag');
      $query = $this->db->get();
      $query = $query->result_array();
      foreach ($query as $value) {
        $data[] = $value['port'];;
      }
      return $data;
    }

    public function getIndexCategorysName($root){
      $data = self::getIndexCategorys($root);
      if (is_array($data)) {
        $output = array();
        foreach ($data as $value) {
          $output[] = $this->db->get_where('category', array('id' => $value))->row()->name;
        }
        return $output;
      }else{
        return false;
      }
    }
    //
    // public function getIndexTags($root){
    //   $sql = 'SELECT indexing.port FROM indexing
    //           INNER JOIN tags ON indexing.port = tags.id AND indexing.type = "tag"
    //           WHERE indexing.root = "'.$root.'"';
    //   $result = $this->db->query($sql);
    //   return $result->row();
    // }


    // Category SDO_DAS_DataObject

    public function select_category_name_by_id($id){
      return $this->db->get_where('category', array('id' => $id))->row()->name;
    }
    public function get_subcategory($id){
      return $this->db->get_where('category', array('parent' => $id))->result();
    }


    // Product

    public function product_mata($data, $rootid) {
      $temp = array();
      $table = 'product_meta';
      if ( is_array($data['courses']) ) {
          foreach ($data['courses'] as $value) {
            $temp['product_id'] = $rootid;
            $temp['source'] = $value;
            $this->db->insert($table, $temp);
          }
      }
      return;
    }
    public function update_product_mata($data, $rootid) {
      $temp = array();
      $table = 'product_meta';
      $this->db->delete($table, array('product_id' => $rootid));
      if ( is_array($data['courses']) ) {
          foreach ($data['courses'] as $value) {
            $temp['product_id'] = $rootid;
            $temp['source'] = $value;
            $this->db->insert($table, $temp);
          }
      }
      return;
    }

    public function home_category(){
      $sql = 'SELECT category.*, COUNT(indexing.id) AS course FROM category
              LEFT JOIN indexing ON indexing.port = category.id AND indexing.type = "category"
              GROUP BY category.id
              ORDER BY category.id DESC';
      $result = $this->db->query($sql);
      return $result->result_array();
    }

    public function home_trending(){
      $sql = 'SELECT lesson.*, thumbnail.thumb AS thumb, thumbnail.image AS image FROM lesson
              INNER JOIN thumbnail ON thumbnail.root = lesson.lesson_id
              WHERE lesson_id IN (
                SELECT indexing.root AS trending FROM category
                LEFT JOIN indexing ON indexing.port = category.id AND indexing.type = "category"
                WHERE category.name = "TRENDING"
              )
              ORDER BY lesson_id DESC';
      $result = $this->db->query($sql);
      return $result->result_array();
    }

    public function get_username($id){
      return $this->db->get_where('user_details', array('user_id' => $id))->row()->name;
    }

    public function get_city_by_name($name){
      $this->db->select('name AS id, name AS text');
      $this->db->from('cities');
      $this->db->where('name LIKE', $name.'%');
      $result = $this->db->get();
      return $result->result();
    }
    public function get_states_by_name($name){
      $this->db->select('name AS id, name AS text');
      $this->db->from('states');
      $this->db->where('name LIKE', $name.'%');
      $result = $this->db->get();
      return $result->result();
    }
}
