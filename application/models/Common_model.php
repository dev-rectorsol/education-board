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
                $destination_thumb  = UPLOAD_FILE . "/images/thumbnail/" ;
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
                $limit_thumb    = 200;

                // Size Image Limit was using (LIMIT TOP)
                $limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

                // Percentase Resize
                if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
                    $percent_medium = $limit_medium/$limit_use ;
                    $percent_thumb  = $limit_thumb/$limit_use ;
                }

                //// Making THUMBNAIL ///////
                $img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
                $img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

                // Configuration Of Image Manipulation :: Dynamic
                $img['thumb_marker'] = '_thumb-'.floor($img['width']).'x'.floor($img['height']) ;
                $img['quality']      = ' 100%' ;
                $img['source_image'] = $source ;
                $img['new_image']    = $destination_thumb ;

                $thumb_nail = $data['raw_name']. $img['thumb_marker'].$data['file_ext'];
                // Do Resizing
                $this->image_lib->initialize($img);
                $this->image_lib->resize();
                $this->image_lib->clear() ;

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
                $thumb  = UPLOAD_FILE . "/images/thumbnail/" . $thumb_nail;
                unlink($source);

                return array(
                    'image' => $images,
                    'thumb' => $thumb
                );
            }
            else {
                echo "Failed! to upload images" ;
            }

    }

    public function indexing($data, $rootid) {
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
    }


}
